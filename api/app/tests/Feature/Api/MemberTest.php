<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Tests\Feature\Api\Factories\MemberRequest;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;

class MemberTest extends TestCase
{
    use WithoutMiddleware;
    use WithFaker;

    public function testStoreValidates()
    {
        $this->json('POST', '/api/lists/1/members', [])->assertStatus(422);
    }

    public function testStoreSucceeds()
    {
        $data = MemberRequest::create($this->faker);

        $this->mailChimp->shouldReceive('post')->with('lists/1/members', $data)->andReturn([]);

        $this->json('POST', '/api/lists/1/members', $data)->assertStatus(201);
    }

    public function testUpdateValidates()
    {
        $this->json('PATCH', '/api/lists/1/members/1', [])->assertStatus(422);
    }

    public function testUpdateSucceeds()
    {
        $data = MemberRequest::create($this->faker);

        $this->mailChimp->shouldReceive('patch')->with('lists/1/members/1', $data)->andReturn([]);

        $this->json('PATCH', '/api/lists/1/members/1', $data)->assertOk();
    }

    public function testDestroySucceeds()
    {
        $this->mailChimp->shouldReceive('delete')->with('lists/1/members/1');

        $this->json('DELETE', '/api/lists/1/members/1')->assertStatus(204);
    }
}
