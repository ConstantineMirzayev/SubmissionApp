<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testValidSubmission()  
    {  
        $response = $this->postJson('/api/submit', [  
            'name' => 'John Doe',  
            'email' => 'john.doe@example.com',  
            'message' => 'This is a test message.',  
        ]);  

        $response->assertStatus(200)  
                 ->assertJson(['success' => 'Your submission is being processed.']);  
    }  
}