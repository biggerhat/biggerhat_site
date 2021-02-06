<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Instruction
 *
 * @property int $id
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $edition
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mini[] $minis
 * @property-read int|null $minis_count
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction whereEdition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Instruction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Instruction extends Model
{
    protected $fillable = [
        'image',
    ];

    public function minis() {
        return $this->belongsToMany(Mini::class);
    }
}
