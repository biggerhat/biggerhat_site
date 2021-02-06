<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Uspecial
 *
 * @property int $id
 * @property string|null $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Upgrade[] $upgrades
 * @property-read int|null $upgrades_count
 * @method static \Illuminate\Database\Eloquent\Builder|Uspecial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Uspecial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Uspecial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Uspecial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uspecial whereName($value)
 * @mixin \Eloquent
 */
class Uspecial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function upgrades() {
        return $this->belongsToMany(Upgrade::class);
    }
}
