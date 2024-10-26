<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Config\Factories;
use Faker\Factory;

class ContactSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create(); 
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data = [
                'name' => $faker->name,
                'gender' => $faker->randomElement(['male', 'female']),
                'CNP' => $faker->numerify('#############'),
                'birth_date' => $faker->date(), 
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->numerify('##########'),
                'created_at' => $faker->dateTime->format('Y-m-d H:i:s')
            ];

            $this->db->table('contacts')->insert($data);
        }
    }
}
