<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AdvertisingCampaignResource
 * @package App\Http\Resources
 */
class AdvertisingCampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'countries' => CountryResource::collection($this->countries),
            'browsers' => CountryResource::collection($this->browsers),
        ];
    }
}
