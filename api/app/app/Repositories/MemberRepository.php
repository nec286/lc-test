<?php

namespace App\Repositories;

use App\Contracts\Member;
use App\ClientAdapter;

class MemberRepository implements Member
{
    protected $client;

    public function __construct(ClientAdapter $client)
    {
        $this->client = $client;
    }

    public function store($list, $data)
    {
        return $this->client->post("lists/$list/members", $data);
    }

    public function update($list, $id, $data)
    {
        return $this->client->patch("lists/$list/members/$id", $data);
    }

    public function destroy($list, $id)
    {
        $this->client->delete("lists/$list/members/$id");
    }
}

