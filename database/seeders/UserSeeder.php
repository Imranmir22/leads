<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->createUsers(null, 3); // Start with 3 top-level users
    }

    private function createUsers($parentId, $depth)
    {
        if ($depth == 0) {
            return;
        }

        // Create a random number of users for this level
        $numUsers = rand(2, 5);
        for ($i = 0; $i < $numUsers; $i++) {
            $user = User::factory()->create(['parent_id' => $parentId]);

            // Randomly decide if this user should have children
            if (rand(0, 1) == 1) {
                $this->createUsers($user->id, $depth - 1);
            }
        }
    }
}
