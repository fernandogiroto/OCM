<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        if ($response->successful()) {
            foreach ($response->json() as $user) {
                User::create([
                    'name'     => $user['name'],
                    'username' => $user['username'],
                    'email'    => $user['email'],
                    'phone'    => $user['phone'],
                    'city'     => $user['address']['city'],
                    'company'  => $user['company']['name'],
                ]);
            }
        } else {
            $this->command->error('Error fetching users from API: ' . $response->status());
        }
    }
}
