<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'title', 'body', 'author_id', 'nature', 'reviewer_id', 'state', 'category_id'
    ];


    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function reviewer()
    {
        return $this->belongsTo('App\Models\User', 'reviewer_id');
    }

    public function keywords()
    {
        return $this->hasMany('App\Models\Keyword');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
