<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Models\PhoneModel;

class Contact extends Entity
{
    protected $attributes = ['id' => null];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    protected $phones;

    public function getPhones()
    {
        if (isset($this->phones)) {
            return $this->phones;
        }

        $phoneModel = new PhoneModel();
        $this->phones = $phoneModel->where('contact_id', $this->attributes['id'])->withDeleted()->findAll();

        return $this->phones;
    }

    public function setPhones($phones)
    {
        $this->phones = $phones;
    }
}
