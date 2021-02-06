<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Card
 *
 * @property int $id
 * @property string|null $front
 * @property string|null $back
 * @property string|null $pdf
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $mini_id
 * @property-read \App\Models\Mini|null $mini
 * @method static \Illuminate\Database\Eloquent\Builder|Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereMiniId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Card whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Card extends Model
{
    protected $fillable = [
        'front',
        'back',
        'pdf',
        'mini_id',
    ];

    public function mini() {
        return $this->belongsTo(Mini::class, 'mini_id', 'id');
    }
}
