<?php

namespace Tests\Feature;

use App\Signature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignaturesTest extends TestCase
{
    use RefreshDatabase;


    public function testRetrieveAllSignatures()
    {
        $examples = factory(Signature::class, 10)->create();
        $response = $this->get('/api/signatures');

        $response->assertStatus(200);
    }


    public function testAddSigunature()
    {
        $example = factory(Signature::class)->make();
        $response = $this->post('/api/signatures', $example->toArray());

        $response->assertStatus(200);
    }
}
