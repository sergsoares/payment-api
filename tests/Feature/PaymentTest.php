<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_can_show_payments()
    {
        
        //Arrange
        factory(\App\Payment::class)->create();

        //Act
        $response = $this->json('GET', '/api/v1/payments');

        //Assert
        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'flag',
                    'number',
                    'date'
                ]
            ]);
            

    }
}
