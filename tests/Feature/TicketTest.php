<?php

namespace Tests\Feature;

use App\Enums\Severity;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_can_create_tickets(): void
    {
        $user = User::factory()->create();
        Category::factory()->create();

        $response = $this->actingAs($user)
            ->get('/tickets', [
                'title' => 'Sample Ticket',
                'description' => 'This is a sample ticket description',
                'category_id' => Category::first()->id,
                'severity' => Severity::LOW->value,
            ]);

        $response->assertStatus(200);
    }
}
