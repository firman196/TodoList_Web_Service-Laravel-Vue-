<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotesResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'completed'     => ($this->completed == 0) ? false:true,
            'completed_at'  => $this->completed_at,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];
    }
}
