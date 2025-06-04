<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Exception;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        try {
            $response = Http::timeout(10)->get('https://jsonplaceholder.typicode.com/users');

            if (!$response->successful()) {
                $this->command->error("Failed to fetch users. Status: " . $response->status());
                return;
            }

            $users = $response->json();

            if (empty($users)) {
                $this->command->warn("API returned empty user data.");
                return;
            }

            foreach ($users as $user) {
                if (!isset($user['name'], $user['username'], $user['email'], $user['address']['city'], $user['company']['name'])) {
                    $this->command->warn("Incomplete data for user, skipping...");
                    continue;
                }

                User::create([
                    'name'     => $user['name'],
                    'username' => $user['username'],
                    'email'    => $user['email'],
                    'phone'    => $user['phone'] ?? null,
                    'city'     => $user['address']['city'],
                    'company'  => $user['company']['name'],
                ]);
            }

            $this->command->info("Users successfully seeded into the database.");
        } catch (Exception $e) {
            $this->command->error("Exception while seeding users: " . $e->getMessage());
        }
    }
}
