<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DniDocumentResource extends JsonResource
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
            'dni_number' => $this->dni_number,
            'dni' => $this->dni,
            'card' => $this->card,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
