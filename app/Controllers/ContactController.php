<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Contact;
use App\Entities\Phone;
use App\Models\ContactModel;
use App\Models\PhoneModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;

class ContactController extends BaseController
{
    private $contactModel;
    private $contactEntity;
    private $phoneModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
        $this->phoneModel = new PhoneModel();

        $this->contactEntity = new Contact();
    }

    public function index()
    {
        $filter = $this->request->getGet('filter');
        $sort = $this->request->getGet('sort') ?? 'created_at';
        $order = $this->request->getGet('order') ?? 'desc';

        $this->contactModel->withDeleted();

        if ($filter) {
            $this->contactModel->like('name', $filter)
                ->orLike('cnp', $filter)
                ->orLike('birth_date', $filter)
                ->orLike('email', $filter);
        }

        $this->contactModel->orderBy($sort, $order);

        $contacts = $this->contactModel->paginate(5);
        $pager = $this->contactModel->pager;

        return view('contacts/index.php', [
            'contacts' => $contacts,
            'pager' => $pager,
            'sort' => $sort,
            'order' => $order,
            'filter' => $filter
        ]);
    }

    public function create()
    {
        return view('contacts/create.php', [
            'contact' => $this->contactEntity
        ]);
    }

    public function store()
    {
        $data = $this->request->getPost();

        $contact = new Contact($data);

        $contactId = $this->contactModel->insert($contact, true);

        foreach ($data['phones'] as $phoneNumber) {
            $phone = new Phone([
                'contact_id' => $contactId,
                'phone_number' => $phoneNumber
            ]);

            $this->phoneModel->insert($phone);
        }

        return redirect()->to('')->with('success', 'Contact created successfully.');
    }

    public function edit($id)
    {
        $contact = $this->contactModel->withDeleted()->find($id);

        if (!$contact) {
            throw PageNotFoundException::forPageNotFound("Contact with ID $id not found.");
        }

        return view('contacts/edit', [
            'contact' => $contact
        ]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        $this->contactModel->update($id, $data);

        $this->phoneModel->where('contact_id', $id)
            ->whereNotIn('phone_number', $data['phones'])
            ->delete();

        foreach ($data['phones'] as $phoneNumber) {

            $existRecord = $this->phoneModel->where('contact_id', $id)
                ->where('phone_number', $phoneNumber)
                ->countAllResults();

            if ($existRecord === 0) {

                $phone = new Phone([
                    'contact_id' => $id,
                    'phone_number' => $phoneNumber
                ]);

                $this->phoneModel->insert($phone);
            }
        }

        return redirect()->to('')->with('success', 'Contact updated successfully.');
    }

    public function delete($id)
    {
        $this->contactModel->delete($id);
        $this->phoneModel->where('contact_id', $id)->delete();

        return $this->response->setJSON([
            'id' => $id,
            'date' => Time::now()->toDateTimeString()
        ]);
    }
}
