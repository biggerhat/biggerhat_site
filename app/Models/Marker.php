<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Marker
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $size
 * @property string|null $icon
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @method static \Illuminate\Database\Eloquent\Builder|Marker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marker query()
 * @method static \Illuminate\Database\Eloquent\Builder|Marker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marker whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marker whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marker whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marker whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marker whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Marker extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function minis() {
        return $this->belongsToMany(Mini::class);
    }
    
}
