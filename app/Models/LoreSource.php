<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LoreSource extends Model {
    protected $guarded = [];

    public function loreEntries(): BelongsToMany {
        return $this->belongsToMany(LoreEntry::class);
    }
}
