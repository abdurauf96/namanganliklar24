<?php

namespace App;
use TCG\Voyager\Traits\Translatable;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;
    protected $translatable=['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }
    
}
