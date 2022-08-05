<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LoreTopicType extends Model {
    protected $guarded = [];

    public function loreTopics(): HasMany {
        return $this->hasMany(LoreTopic::class);
    }
}
