<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class PasswordType extends Model
{
    use HasFactory;
    use Sluggable;

    public function stores()
    {
        return $this->hasMany('App\Models\Store');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'type_name'
            ]
        ];
    }
}
