<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
   protected $fillable=['name','prise','picture','description','categories_id'];

   public function getPicture()
   {
       return $this->picture ??'';
   }

}
