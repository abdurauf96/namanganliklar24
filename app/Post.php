<?php

namespace App;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Translatable;
    use Resizable;
    protected $translatable=['title', 'excerpt', 'body'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
}
