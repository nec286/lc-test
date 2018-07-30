<?php

namespace Tests\Feature\Api\Factories;

class MemberRequest
{
    public static function create($faker)
    {
        return [
            'email_address' => $faker->email(),
            'status' => 'subscribed'
        ];
    }
}
