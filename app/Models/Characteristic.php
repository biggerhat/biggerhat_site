<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Characteristic
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Characteristic extends Model
{
    protected $fillable = [
        'name'
    ];  
    
    public function minis() {
        return $this->belongsToMany(Mini::class);
    }
}
