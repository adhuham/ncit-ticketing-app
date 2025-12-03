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

    public function test_can_create_tickets(): void
    {
        $user = User::factory()->create();
        Category::factory()->create();

        $response = $this->actingAs($user)
            ->post('/tickets', [
                'title' => 'Sample Ticket',
                'description' => 'This is a sample ticket description',
                'category_id' => Category::first()->id,
                'severity' => Severity::LOW->value,
            ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_cannot_create_tickets_without_title_and_description(): void
    {
        $user = User::factory()->create();
        Category::factory()->create();

        $response = $this->actingAs($user)
            ->post('/tickets', [
                'title' => null,
                'description' => null,
                'category_id' => Category::first()->id,
                'severity' => Severity::LOW->value,
            ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors();

    }
}