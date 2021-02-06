<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Episode
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $resource_id
 * @property int|null $resource_type_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faction[] $factions
 * @property-read int|null $factions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @property-read \App\Models\Resource|null $resource
 * @property-read \App\Models\ResourceType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereResourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereResourceTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsTo(ResourceType::class,'resource_type_id','id');
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
