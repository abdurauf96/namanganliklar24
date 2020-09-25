<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use Translatable;
    protected $translatable=['name'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
