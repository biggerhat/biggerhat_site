<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Promo
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $front
 * @property string|null $back
 * @property string|null $pdf
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $mini_id
 * @property-read \App\Models\Mini|null $mini
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereFront($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereMiniId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Promo extends Model
{
    protected $fillable = [
        'name',
        'description',
        'front',
        'back',
        'pdf',
        'mini_id',
    ];

    public function mini() {
        return $this->belongsTo(Mini::class);
    }
    
}
