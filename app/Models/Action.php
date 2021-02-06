<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Action
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $bonus
 * @property int|null $range
 * @property string|null $stat
 * @property string|null $stat_suits
 * @property string|null $stat_modifier
 * @property string|null $resist
 * @property string|null $target
 * @property string|null $target_suits
 * @property string|null $description
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $range_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Trigger[] $triggers
 * @property-read int|null $triggers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Action newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Action newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Action query()
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereRangeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereResist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereStat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereStatModifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereStatSuits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereTargetSuits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Action whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Action extends Model
{
    protected $fillable = [
        'name',
        'type',
        'bonus',
        'range',
        'stat',
        'stat_suits',
        'stat_modifier',
        'resist',
        'target',
        'target_suits',
        'description',
        'notes',
        'range_type',
    ];

    protected $with = [
        'questions',
        'triggers',
    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function triggers()
    {
        return $this->belongsToMany(Trigger::class);
    }

    public function questions() {
        return $this->belongsToMany(Question::class);
    }
}
