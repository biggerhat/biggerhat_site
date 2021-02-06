<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Question
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $answer
 * @property int|null $ability_id
 * @property int|null $mini_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ability|null $ability
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Action[] $action
 * @property-read int|null $action_count
 * @property-read \App\Models\Mini|null $mini
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereAbilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereMiniId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Question extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'ability_id',
        'mini_id',
    ];

    public function ability() {
        return $this->hasOne(Ability::class);
    }

    public function action() {
        return $this->belongsToMany(Action::class);
    }

    public function mini() {
        return $this->hasOne(Mini::class);
    }
}
