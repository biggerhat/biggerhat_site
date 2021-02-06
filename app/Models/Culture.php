<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Culture
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $link
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Culture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Culture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Culture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Culture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Culture whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Culture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Culture whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Culture whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Culture whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Culture whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Culture extends Model
{
    
}
