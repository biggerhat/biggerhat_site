<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Trigger extends Model
{
    protected $fillable = [
        'suits',
        'name',
        'description',
        'notes'
    ];

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
