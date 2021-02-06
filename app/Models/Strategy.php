<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Strategy
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $suit
 * @property string|null $description
 * @property string|null $tactica
 * @property int|null $season_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property-read \App\Models\Season|null $season
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy whereSuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy whereTactica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Strategy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Strategy extends Model
{
    protected $fillable = [
        'name',
        'suit',
        'description',
        'tactica',
        'season_id',
        'image',
    ];

    public function season() {
        return $this->belongsTo(Season::class);
    }
}
