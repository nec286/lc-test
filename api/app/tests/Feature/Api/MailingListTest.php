<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Tests\Feature\Api\Factories\MailingListRequest;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;

class MailingListTest extends TestCase
{
    use WithoutMiddleware;
    use WithFaker;

    public function testStoreValidates()
    {
        $this->json('POST', '/api/lists', [])->assertStatus(422);
    }

    public function testStoreSucceeds()
    {
        $data = MailingListRequest::create($this->faker);

        $this->mailChimp->shouldReceive('post')->with('lists', $data)->andReturn([
            'id' => 1
        ]);

        $this->json('POST', '/api/lists', $data)->assertStatus(201);
    }

    public function testUpdateValidates()
    {
        $this->json('PATCH', '/api/lists/1', [])->assertStatus(422);
    }

    public function testUpdateSucceeds()
    {
        $data = MailingListRequest::create($this->faker);

        $this->mailChimp->shouldReceive('patch')->with('lists/1', $data)->andReturn([]);

        $this->json('PATCH', '/api/lists/1', $data)->assertOk();
    }

    public function testDestroySucceeds()
    {
        $this->mailChimp->shouldReceive('delete')->with('lists/1');

        $this->json('DELETE', '/api/lists/1')->assertStatus(204);
    }
}
