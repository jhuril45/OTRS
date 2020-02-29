<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket_support extends Model
{
    protected $table = 'ticket_support';

    public function ticket()
    {
        return $this->hasOne('App\ticket','ticket_id','ticket_id');
    }
}
