<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Resource extends Model
{
    protected $fillable = [
        'name',
        'description',
        'link',
        'logo',
    ];

    public function types() 
    {
        return $this->belongsToMany(ResourceType::class, 'resource_resourcetype');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
    
}
