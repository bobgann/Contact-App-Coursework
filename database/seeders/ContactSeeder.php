<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        $faker = Faker::create();

        foreach ($companies as $company) {
            $contact = [
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker ->email(),
                'address' => $faker->address(),
                'company_id' => $company->id,
            ];
            Contact::create($contact);
        }
    }
}
