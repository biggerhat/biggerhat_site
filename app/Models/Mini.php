<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\MiniSaved;


/**
 * App\Models\Mini
 *
 * @property int $id
 * @property string|null $name
 * @property int $station_id
 * @property int|null $cost
 * @property int|null $wounds
 * @property int|null $size
 * @property int|null $base
 * @property int|null $defense
 * @property string|null $defense_suit
 * @property int|null $willpower
 * @property string|null $willpower_suit
 * @property int|null $move
 * @property int|null $quantity
 * @property string|null $aka
 * @property string|null $description
 * @property string|null $tag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $hidden_keyword_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Action[] $actions
 * @property-read int|null $actions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Box[] $boxes
 * @property-read int|null $boxes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Card[] $cards
 * @property-read int|null $cards_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Characteristic[] $characteristics
 * @property-read int|null $characteristics_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Episode[] $episodes
 * @property-read int|null $episodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Errata[] $erratas
 * @property-read int|null $erratas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faction[] $factions
 * @property-read int|null $factions_count
 * @property-read \App\Models\Keyword|null $hiddenKeyword
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Instruction[] $instructions
 * @property-read int|null $instructions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Marker[] $markers
 * @property-read int|null $markers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Promo[] $promos
 * @property-read int|null $promos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @property-read \App\Models\Station $station
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Upgrade[] $upgrades
 * @property-read int|null $upgrades_count
 * @method static \Illuminate\Database\Eloquent\Builder|Mini newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mini newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mini query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereAka($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereDefense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereDefenseSuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereHiddenKeywordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereMove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereWillpower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereWillpowerSuit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mini whereWounds($value)
 * @mixin \Eloquent
 */
class Mini extends Model
{
    protected $fillable = [
        'name',
        'station_id',
        'cost',
        'wounds',
        'size',
        'base',
        'defense',
        'defense_suit',
        'willpower',
        'willpower_suit',
        'move',
        'quantity',
        'aka',
        'description',
        'tag',
        'hidden_keyword_id',
    ];

    protected $dispatchesEvents = [
        'saved' => MiniSaved::class,
    ];


    protected $with = [
        'factions',
        'keywords',
        'characteristics',
        'abilities',
        'station',
        'actions',
        'upgrades',
        'cards',
        'erratas',
        'markers',
        'questions',
        'tokens',
        'promos',
        'instructions',
        'boxes',
        'episodes',
    ];

    public function factions()
    {
        return $this->belongsToMany(Faction::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function hiddenKeyword()
    {
        return $this->belongsTo(Keyword::class, 'hidden_keyword_id', 'id');
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class);
    }

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }

    public function upgrades()
    {
        return $this->belongsToMany(Upgrade::class);
    }

    public function cards() {
        return $this->hasMany(Card::class, 'mini_id', 'id');
    }

    public function erratas() {
        return $this->hasMany(Errata::class, 'mini_id', 'id');
    }

    public function markers() {
        return $this->belongsToMany(Marker::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function tokens() {
        return $this->belongsToMany(Token::class);
    }
     
    public function promos() {
        return $this->hasMany(Promo::class, 'mini_id', 'id');
    }

    public function instructions() {
        return $this->belongsToMany(Instruction::class);
    }

    public function boxes() {
        return $this->belongsToMany(Box::class);
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }
    
}
