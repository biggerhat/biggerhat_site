<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Keyword
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $tactica
 * @property string|null $tag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Episode[] $episodes
 * @property-read int|null $episodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $hiddenKeywords
 * @property-read int|null $hidden_keywords_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereTactica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keyword whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Keyword extends Model
{
    protected $fillable = [
        'name',
        'description',
        'tactica',
        'tag',
    ];
    
    public function minis() {
        return $this->belongsToMany(Mini::class);
    }

    public function hiddenKeywords() {
        return $this->hasMany(Mini::class, 'hidden_keyword_id', 'id');
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }
}
