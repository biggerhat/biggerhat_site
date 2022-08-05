<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\ResourceSaved;


class Resource extends Model
{
    protected $fillable = [
        'name',
        'description',
        'link',
        'logo',
    ];

    protected $dispatchesEvents = [
        'saved' => ResourceSaved::class,
    ];

    public function types()
    {
        return $this->belongsToMany(ResourceType::class, 'resource_resourcetype')->orderBy('name');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class)->orderBy('name');
    }
}
