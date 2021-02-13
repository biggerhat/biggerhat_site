<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ResourceType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon',
    ];

    public function resources()
    {
        return $this->belongsToMany(Resource::class, 'resource_resourcetype');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
