<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Episode extends Model
{
    protected $fillable = [
        'name',
        'description',
        'link',
        'resource_id',
    ];

    protected $with = [
        'type',
    ];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function type()
    {
        return $this->belongsTo(ResourceType::class, 'resource_type_id', 'id');
    }

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function factions()
    {
        return $this->belongsToMany(Faction::class);
    }
}
