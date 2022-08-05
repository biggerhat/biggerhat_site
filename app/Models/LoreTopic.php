<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LoreTopic extends Model {
    protected $guarded = [];

    public function loreTopicType(): BelongsTo {
        return $this->belongsTo(LoreTopicType::class);
    }

    public function loreEntries(): BelongsToMany {
        return $this->belongsToMany(LoreEntry::class);
    }
}
