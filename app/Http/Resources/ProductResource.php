<?php

namespace App\Http\Resources;

use App\Models\Price;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'short_desription' => $this->short_description,
            'long_desription' => $this->long_description,
            'price' => PriceResource::collection($this->price),
            'category' => CategoryResource::collection($this->categories)
        ];
    }
}
