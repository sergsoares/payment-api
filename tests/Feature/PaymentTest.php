<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Payment;

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
        $payment = factory(Payment::class)->create();

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
        $payment = factory(Payment::class)->create();
        
        // Act
        $response = $this->json('DELETE', '/api/v1/payments/'.$payment->id);

        // Assert
        $response->assertStatus(204);
    }

    /** @test */
    public function it_can_update_an_payment()
    {
        //Arrange
        $payment = factory(Payment::class)->create();
        $payload = ['flag' => 'CIELO'];

        
        //Act
        $response = $this->json('PUT', '/api/v1/payments/'.$payment->id, $payload);
    
        //Assert
        $response->assertStatus(200)
            ->assertJsonStructure([
                'flag',
                'number',
                'date'
                ])
            ->assertJson([
                'flag' => 'CIELO',
                'number' => $payment->number,
                'date' =>  $payment->date
                ]);
    }

    /** @test */
    public function it_can_store_new_payment()  
    {
        //Arrange        
        $payload = [
            'flag' => 'SERGIO',
            'number' => '234234235',
            'date' => '22/23'
            ];

        //Act
        $response = $this->json('POST', '/api/v1/payments', $payload);

        //Assert
        $response->assertStatus(200)
            ->assertJsonStructure([
                'flag',
                'number',
                'date'
                ])
            ->assertJson($payload);
    }    
}
