<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Exceptions\ClientException;

class ClientAdapterTest extends TestCase
{
    public function testRequest()
    {
        $client = $this->app->make('App\ClientAdapter');

        $this->expectException(ClientException::class);

        $this->mailChimp->shouldReceive('get')->with('')->andReturn([
            'status' => 400
        ]);

        $client->get('');
    }
}
