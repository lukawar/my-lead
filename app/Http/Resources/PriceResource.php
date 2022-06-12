<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'netto' => $this->netto_price,
            'gross' => $this->gross_price,
            'tax' => $this->tax,
            'description' => $this->description,
            'condition' => $this->condition
        ];
    }
}
