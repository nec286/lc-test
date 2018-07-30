<?php

namespace Tests\Feature\Api\Factories;

class MailingListRequest
{
    public static function create($faker)
    {
        return [
            'name' => $faker->word(),
            'contact' => [
                'company' => $faker->company(),
                'address1' => $faker->streetAddress(),
                'city' => $faker->city(),
                'state' => $faker->state(),
                'zip' => $faker->postcode(),
                'country' => $faker->countryCode(),
                'phone' => $faker->phoneNumber()
            ],
            'permission_reminder' => $faker->sentence(),
            'campaign_defaults' => [
                'from_name' => $faker->firstName(),
                'from_email' => $faker->email(),
                'subject' => $faker->word(),
                'language' => $faker->languageCode()
            ],
            'email_type_option' =>  false
        ];
    }
}
