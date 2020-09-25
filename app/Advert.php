<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Advert extends Model
{
    use Translatable;
    protected $translatable=['title', 'image'];
}
