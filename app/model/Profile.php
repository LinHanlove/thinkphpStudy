<?php

namespace app\model;

use think\Model;

class Profile extends Model
{
    public function userModel()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}