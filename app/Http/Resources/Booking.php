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
        return [
            'id'=>$this->id,
            'frst_name'=>$this->frst_name,
            'last_name'=>$this->last_name,
            'mobile_no'=>$this->mobile_no,
            'address'=>$this->address,
            'v_no'=>$this->v_no,
            'distance'=>$this->distance,
            'v_remarks'=>$this->v_remarks,
        ];
    }
}
