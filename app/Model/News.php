<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function getPicture()
    {
        return $this->picture ??'';
    }
}
