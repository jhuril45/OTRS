<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $table = 'ticket';

    public function service()
    {
        return $this->hasOne('App\service','service_id','service_id');
    }
}
