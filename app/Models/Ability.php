<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Ability
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ability extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    protected $with = [
        'questions',
    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
    
}
