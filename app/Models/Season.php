<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Season
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Deployment[] $deployments
 * @property-read int|null $deployments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Errata[] $erratas
 * @property-read int|null $erratas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Scheme[] $schemes
 * @property-read int|null $schemes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Strategy[] $strategies
 * @property-read int|null $strategies_count
 * @method static \Illuminate\Database\Eloquent\Builder|Season newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season query()
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Season extends Model
{
    protected $fillable = [
        'name',
        'description',
        'link'
    ];

    public function erratas() {
        return $this->hasMany(Errata::class);
    }
    
    public function schemes() {
        return $this->hasMany(Scheme::class);
    }

    public function strategies() {
        return $this->hasMany(Strategy::class);
    }

    public function deployments() {
        return $this->hasMany(Deployment::class);
    }
}
