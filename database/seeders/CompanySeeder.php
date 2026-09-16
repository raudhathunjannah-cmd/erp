<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'PT Makmur',
            'address' => 'Jl. Raya Mandiri No. 123, Medan',
            'email' => 'info@mcs.com',
            'phone_number' => '08123456789',
        ]);
    }
}