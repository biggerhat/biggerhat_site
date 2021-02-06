<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Box
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $front
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $back
 * @property string|null $edition
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @method static \Illuminate\Database\Eloquent\Builder|Box newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Box newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Box query()
 * @method static \Illuminate\Database\Eloquent\Builder|Box whereBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Box whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Box whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Box whereEdition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Box whereFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Box whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Box whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Box whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Box extends Model
{
    protected $fillable = [
        'name',
        'description',
        'front',
        'back',
    ];

    public function minis() {
        return $this->belongsToMany(Mini::class);
    }
    
}
