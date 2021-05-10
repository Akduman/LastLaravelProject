<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\IUser;
use App\Models\User;
use App\Http\Repositories\BaseRepository ;

class UserRepository extends BaseRepository implements IUser
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    
}