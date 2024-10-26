<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Contact;
use App\Models\ContactModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class ContactController extends BaseController
{
    private $contactModel;
    private $contactEntity;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
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
                ->orLike('email', $filter)
                ->orLike('phone', $filter);
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

        $this->contactModel->insert($contact);

        return redirect()->to('')->with('success', 'Contact created successfully.');
    }

    public function edit($id)
    {
        $contact = $this->contactModel->withDeleted()->find($id);

        return view('contacts/edit', [
            'contact' => $contact
        ]);
    }

    public function update($id)
    {
        $contactModel = new ContactModel();
        
        $contact = $contactModel->withDeleted()->find($id);

        $contact->fill($this->request->getPost());
        
        if ($contact->hasChanged()) {

            $contactModel->save($contact);

            return redirect()->to('')->with('success', 'Contact updated successfully.');
        }

        return redirect()->to('')->with('warning', 'The contact wasn\'t updated.');
    }

    public function delete($id)
    {
        $this->contactModel->delete($id);

        return $this->response->setJSON([
            'id' => $id,
            'date' => Time::now()->toDateTimeString()
        ]);
    }
}
