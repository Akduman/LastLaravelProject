<?php

namespace App\Http\Resources\AdminRole;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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

            'AdminUserResoruce---Id'=>$this->id,
            'AdminUserResoruce---Email' =>$this->email

        ];
    }
}
