<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Faction
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $tactica
 * @property string|null $image
 * @property string|null $tag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property mixed $hidden
 * @property string|null $bg_color
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Episode[] $episodes
 * @property-read int|null $episodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Upgrade[] $upgrades
 * @property-read int|null $upgrades_count
 * @method static \Illuminate\Database\Eloquent\Builder|Faction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereTactica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Faction extends Model
{

    protected $fillable = [
        'name',
        'description',
        'tactica',
        'image',
        'tag',
        'hidden',
    ];

    public function minis() {
        return $this->belongsToMany(Mini::class);
    }

    public function upgrades() {
        return $this->belongsToMany(Upgrade::class);
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }
    
}
