<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
