<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketSubject extends Model
{
    protected $fillable = [
      'fa','en','tr','agent_type'
    ];
}
