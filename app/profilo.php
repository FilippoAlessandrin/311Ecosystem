<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profilo extends Model
{
    protected $table = 'profilo';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
