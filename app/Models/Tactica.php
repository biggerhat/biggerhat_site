<?php

namespace App\Models;

use App\Events\TacticaSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tactica extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'author',
        'keyword_id',
        'faction_id',
        'mini_id',
        'upgrade_id',
        'scheme_id',
        'strategy_id',
        'slug',
    ];

    protected $dispatchesEvents = [
        'saved' => TacticaSaved::class,
    ];

    public function keyword()
    {
        return $this->belongsTo(Keyword::class, 'keyword_id', 'id');
    }

    public function faction()
    {
        return $this->belongsTo(Faction::class, 'faction_id', 'id');
    }

    public function mini()
    {
        return $this->belongsTo(Mini::class, 'mini_id', 'id');
    }

    public function upgrade()
    {
        return $this->belongsTo(Upgrade::class, 'upgrade_id', 'id');
    }

    public function scheme()
    {
        return $this->belongsTo(Scheme::class, 'scheme_id', 'id');
    }

    public function strategy()
    {
        return $this->belongsTo(Strategy::class, 'strategy_id', 'id');
    }
}
