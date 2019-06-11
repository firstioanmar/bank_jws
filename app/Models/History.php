<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class History extends Model
{
    protected $fileable = [
      'type_history', 'from', 'to', 'value',
    ];



    public function users_from()
    {
      return $this->belongsTo('App\Models\User', 'from', 'id');
    }

    public function users_to()
    {
      return $this->belongsTo('App\Models\User', 'to', 'id');
    }

}
