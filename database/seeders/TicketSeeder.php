<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        for ($i = 1; $i <= 10; $i++) {
            $ticket = new Ticket();
            $ticket->user_id = $users->random()->id;
            $ticket->title = fake()->sentence();
            $ticket->description = fake()->paragraph();
            $ticket->category_id = $categories->random()->id;
            $ticket->severity = fake()->randomElement(['low', 'medium', 'high']);
            $ticket->save();
        }       
    }
}
