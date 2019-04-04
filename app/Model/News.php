<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * @return mixed|string
     */
    public function getPicture()
    {
        return $this->picture ?? '';
    }
}
