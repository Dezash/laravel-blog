<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'message', 'sender_id', 'user_id'
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
