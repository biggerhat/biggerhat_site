<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Errata
 *
 * @property int $id
 * @property int|null $mini_id
 * @property int|null $upgrade_id
 * @property int|null $season_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mini|null $mini
 * @property-read \App\Models\Season|null $season
 * @property-read \App\Models\Upgrade|null $upgrade
 * @method static \Illuminate\Database\Eloquent\Builder|Errata newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Errata newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Errata query()
 * @method static \Illuminate\Database\Eloquent\Builder|Errata whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Errata whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Errata whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Errata whereMiniId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Errata whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Errata whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Errata whereUpgradeId($value)
 * @mixin \Eloquent
 */
class Errata extends Model
{
    protected $fillable = [
        'description',
        'season_id',
        'upgrade_id',
        'mini_id',
    ];

    protected $with = [
        'season'
    ];

    public function upgrade() {
        return $this->belongsTo(Upgrade::class);
    }

    public function mini() {
        return $this->belongsTo(Mini::class);
    }

    public function season() {
        return $this->belongsTo(Season::class);
    }
    
}
