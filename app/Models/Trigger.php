<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Trigger
 *
 * @property int $id
 * @property string|null $suits
 * @property string|null $name
 * @property string|null $description
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Action[] $actions
 * @property-read int|null $actions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger whereSuits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trigger whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Trigger extends Model
{
    protected $fillable = [
        'suits',
        'name',
        'description',
        'notes'
    ];

    public function actions() {
        return $this->belongsToMany(Action::class);
    }
    
}
