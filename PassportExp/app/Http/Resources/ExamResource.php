<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
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

            'Resoruce---Id'=>$this->id,
            'Resoruce---name' =>$this->name,
            'Resoruce---title' =>$this->title

        ];
    }
}
