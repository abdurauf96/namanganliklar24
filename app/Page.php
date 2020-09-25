<?php

namespace App;
use TCG\Voyager\Traits\Translatable;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Translatable;
   
    protected $translatable=['title', 'excerpt', 'body', 'slug'];

    
}
