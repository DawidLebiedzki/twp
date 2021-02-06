<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Article;

class Drawing extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id',
        'drawing_number',
        'index',
        'stage',
        'operation',
        'user_id'
    ];

    public function drawings()
    {
        return $this->belongsToMany('App\Artivle');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
