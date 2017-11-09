<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id', 'name', 'description', 'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->getBelongsToMany(Ingredient::class);
    }

}
