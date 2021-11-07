<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class createContactTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function guest_can_create_a_new_contact() 
    {
         $response = $this->post('/createcontact', [
            'first_name' => 'Example fname',
            'last_name' => 'Example lname',
            'phone' => '01234123123',
            'email' => 'jonathankoul@gmail.com',
            'address' => '123 abc street',
        ]);
 
        $this->assertDatabaseHas('contacts', [
            'first_name' => 'Example fname'
        ]);
 
        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/'));
 
    }

    /** @test */
    function link_is_not_created_if_validation_fails() {}

    /** @test */
    function link_is_not_created_with_an_invalid_url() {}

    /** @test */
    function max_length_fails_when_too_long() {}

    /** @test */
    function max_length_succeeds_when_under_max() {}
}
