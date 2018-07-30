<?php

namespace App\Repositories;

use App\Contracts\MailingList;
use App\ClientAdapter;

class MailingListRepository implements MailingList
{
    protected $client;

    public function __construct(ClientAdapter $client)
    {
        $this->client = $client;
    }

    public function store($data)
    {
        return $this->client->post("lists", $data);
    }

    public function update($id, $data)
    {
        return $this->client->patch("lists/$id", $data);
    }

    public function destroy($id)
    {
        $this->client->delete("lists/$id");
    }
}

