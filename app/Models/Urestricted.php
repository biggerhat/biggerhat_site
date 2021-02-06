<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Urestricted
 *
 * @property int $id
 * @property string|null $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Upgrade[] $upgrades
 * @property-read int|null $upgrades_count
 * @method static \Illuminate\Database\Eloquent\Builder|Urestricted newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Urestricted newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Urestricted query()
 * @method static \Illuminate\Database\Eloquent\Builder|Urestricted whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Urestricted whereName($value)
 * @mixin \Eloquent
 */
class Urestricted extends Model
{
    protected $fillable = [
        'name',
    ];

    public function upgrades() {
        return $this->belongsToMany(Upgrade::class);
    }
    
}
