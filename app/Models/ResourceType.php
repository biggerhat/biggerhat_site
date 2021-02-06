<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ResourceType
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $icon
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Episode[] $episodes
 * @property-read int|null $episodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resource[] $resources
 * @property-read int|null $resources_count
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
