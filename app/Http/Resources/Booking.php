<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Booking extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'room_id' => $this->room_id,
            'total_person' => $this->total_person,
            'booking_time' => $this->booking_time,
            'noted' => $this->noted,
            'check_in_time' => $this->check_in_time,
            'check_out_time' => $this->check_out_time,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'delete_at' => $this->delete_at->format('d/m/Y'),
        ];
    }
}