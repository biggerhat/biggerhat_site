<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Token
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @method static \Illuminate\Database\Eloquent\Builder|Token newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token query()
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Token extends Model
{
    protected $fillable = [
        'name',
        'description',

    ];

    public function minis() {
        return $this->belongsToMany(Mini::class);
    }
    
}
