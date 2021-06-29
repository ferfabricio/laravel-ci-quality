<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EchoTest extends TestCase
{
    use DatabaseTransactions;

    public function testValidation()
    {
        $this->assertDatabaseMissing('logs', ['test_text' => '']);
        $response = $this->post('/api/echo', [
            'test' => ''
        ]);
        $response->assertStatus(422);
        $response->assertJson([
            'errors' => [
                'test' => ['The test field is required.'],
            ],
        ]);
        $this->assertDatabaseMissing('logs', ['test_text' => '']);
    }

    public function testEcho()
    {
        $this->assertDatabaseMissing('logs', ['test_text' => '']);
        $response = $this->post('/api/echo', [
            'test' => 'this is a test string'
        ]);
        $response->assertOk();
        $response->assertJsonStructure([
            'id',
            'test_text',
            'created_at',
            'updated_at',
        ]);
        $response->assertJsonFragment([
            'test_text' => 'this is a test string'
        ]);
        $this->assertDatabaseHas('logs', ['test_text' => 'this is a test string']);
    }
}
