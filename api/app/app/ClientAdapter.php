<?php

namespace App;

use App\Exceptions\ClientException;

class ClientAdapter
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function post($path, $data)
    {
        return $this->request('post', $path, $data);
    }

    public function get($path)
    {
        return $this->request('get', $path);
    }

    public function patch($path, $data)
    {
        return $this->request('patch', $path, $data);
    }

    public function delete($path)
    {
        return $this->request('delete', $path);
    }

    protected function request($verb, $path, ...$args)
    {
        $response = $this->client->$verb($path, ...$args);

        if($this->responseIsError($response)) {
            throw new ClientException($response);
        }

        return $response;
    }

    protected function responseIsError($response)
    {
        return preg_match('/[3-5]\d{2}/',
            $response['status'] ?? '', $m);
    }
}
