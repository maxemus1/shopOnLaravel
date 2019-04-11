<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name', 'prise', 'picture', 'description', 'categories_id'];

    /**
     * @return mixed|string
     */
    public function getPicture()
    {
        return $this->picture ?? '';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'products_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categories()
    {
        return $this->hasOne(Categories::class, 'id', 'categories_id');
    }
}
