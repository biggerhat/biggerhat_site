<?php

namespace App\Models;

use App\Events\BoxSaved;
use Illuminate\Database\Eloquent\Model;



class Box extends Model
{
    protected $fillable = [
        'name',
        'description',
        'front',
        'back',
    ];

    protected $dispatchesEvents = [
        'saved' => BoxSaved::class,
    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class)
            ->withPivot('quantity');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function instructions()
    {
        return $this->belongsToMany(Instruction::class);
    }

    public function promos()
    {
        return $this->belongsToMany(Promo::class);
    }
}
