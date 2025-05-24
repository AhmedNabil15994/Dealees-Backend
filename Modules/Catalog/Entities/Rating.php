<?php

namespace Modules\Catalog\Entities;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Rating extends Model
{
    protected $fillable = ["user_id", "product_id","rate"];
    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

}


