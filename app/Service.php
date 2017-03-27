<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    public function services()
    {
        return $this->hasMany(Member::class);
    }
}
