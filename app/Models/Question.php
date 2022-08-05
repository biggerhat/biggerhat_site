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

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function triggers()
    {
        return $this->belongsToMany(Trigger::class);
    }

    public function schemes()
    {
        return $this->belongsToMany(Scheme::class);
    }

    public function strategies()
    {
        return $this->belongsToMany(Strategy::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function section()
    {
        return $this->belongsTo(QuestionSection::class);
    }
}
