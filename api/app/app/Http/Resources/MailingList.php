<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MailingList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_only($this->resource, [
            'name',
            'id',
            'email_type_option',
            'permission_reminder',
            'contact',
            'campaign_defaults',
        ]);
    }
}
