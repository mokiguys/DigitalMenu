<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
      'user_agent','agent_id','close','parent_id','subject','message'
    ];

    public function Users()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
