<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'deleted_at' => $this->deleted_at,
            'company_id' => $this->company_id,
            'user_id' => $this->user_id,
            'number' => $this->number,
            'name' => $this->name,
            'remit' => $this->remit,
            'dni' => $this->dni,
            'card' => $this->card,
            'sign' => $this->sign,
            'dni_number' => $this->dni_number,
            'card_number' => $this->card_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
