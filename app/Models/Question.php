<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'ability_id',
        'mini_id',
    ];

    public function ability()
    {
        return $this->belongsTo(Ability::class);
    }

    public function action()
    {
        return $this->belongsToMany(Action::class);
    }

    public function mini()
    {
        return $this->belongsTo(Mini::class);
    }
}
