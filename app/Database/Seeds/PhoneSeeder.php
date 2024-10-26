<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use App\Models\ContactModel;

class PhoneSeeder extends Seeder
{
    public function run()
    {
        $contactModel = new ContactModel();
        $contacts = $contactModel->findAll();

        $faker = Factory::create(); 

        foreach ($contacts as $contact) {

            $phoneCount = rand(1, 3);

            for ($i = 0; $i < $phoneCount; $i++) {

                $data = [
                    'contact_id'   => $contact->id,
                    'phone_number' => $faker->numerify('##########'),
                    'created_at' => $faker->dateTime->format('Y-m-d H:i:s')
                ];

                $this->db->table('phones')->insert($data);
            }
        }
    }
}
