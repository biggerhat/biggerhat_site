<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Scheme
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $number
 * @property string|null $description
 * @property string|null $tactica
 * @property int|null $season_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property string|null $reveal
 * @property string|null $end
 * @property-read \App\Models\Season|null $season
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereReveal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereTactica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scheme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Scheme extends Model
{
       protected $fillable = [
            'name',
            'number',
            'description',
            'reveal',
            'end',
            'tactica',
            'season_id',
            'image',
       ];

       public function season() {
            return $this->belongsTo(Season::class);
       }
}
