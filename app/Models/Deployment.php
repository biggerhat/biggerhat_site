<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Deployment
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $image
 * @property int|null $season_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $suit
 * @property-read \App\Models\Season|null $season
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereSuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Deployment extends Model
{
    protected $fillable = [
        'name',
        'description',
        'suit',
        'image',
        'season_id',
    ];

    public function season() {
        return $this->belongsTo(Season::class);
    }
}
