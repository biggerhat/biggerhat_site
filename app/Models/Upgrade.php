<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Upgrade
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $plentiful
 * @property string|null $description
 * @property int|null $cost
 * @property string|null $tactica
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property string|null $pdf
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Errata[] $erratas
 * @property-read int|null $erratas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faction[] $factions
 * @property-read int|null $factions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Urestricted[] $urestricteds
 * @property-read int|null $urestricteds_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Uspecial[] $uspecials
 * @property-read int|null $uspecials_count
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade wherePlentiful($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereTactica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upgrade whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Upgrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'plentiful',
        'description',
        'cost',
        'tactica',
    ];

    protected $with = [
        'uspecials',
        'urestricteds',
    ];

    public function minis() {
        return $this->belongsToMany(Mini::class);
    }

    public function uspecials() {
        return $this->belongsToMany(Uspecial::class);
    }

    public function urestricteds() {
        return $this->belongsToMany(Urestricted::class);
    }

    public function erratas() {
        return $this->hasMany(Errata::class);
    }

    public function factions() {
        return $this->belongsToMany(Faction::class);
    }
}
