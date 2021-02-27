<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ResourceType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon',
        'icon_large',
        'slug',
    ];

    public function resources()
    {
        return $this->belongsToMany(Resource::class, 'resource_resourcetype')->orderBy('name');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
