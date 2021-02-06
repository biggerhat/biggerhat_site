<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Resource
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $link
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Episode[] $episodes
 * @property-read int|null $episodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ResourceType[] $types
 * @property-read int|null $types_count
 * @method static \Illuminate\Database\Eloquent\Builder|Resource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resource query()
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
