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
        factory(\App\Payment::class,5)->create();

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

    /** @test */
    public function it_can_show_individual_payment()
    {
        //Arrange
        $payment = factory(\App\Payment::class)->create();

        //Act
        $response = $this->json('GET', '/api/v1/payments/'.$payment->id);

        //Assert
        $response->assertStatus(200)
            ->assertJsonStructure([
                'flag',
                'number',
                'date'
            ])
            ->assertJson(
                $payment->toArray()
            );
    }

    /** @test */
    public function it_can_destroy_an_payment()
    {
        //Arrange 
        $payment = factory(\App\Payment::class)->create();
        
        // Act
        $response = $this->json('DELETE', '/api/v1/payments/'.$payment->id);

        // Assert
        $response->assertStatus(204);
    }

}
