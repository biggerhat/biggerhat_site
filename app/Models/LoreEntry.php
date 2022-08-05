<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Str;

class LoreEntry extends Model {
    protected $guarded = [];

    protected static function booted() {
        static::saved(function ($loreEntry) {
            $loreEntry->slug = Str::slug($loreEntry->title);
            $loreEntry->saveQuietly();

            $unslugged = LoreEntry::whereNull("slug")->get();
            foreach ($unslugged as $unslug) {
                $unslug->slug = Str::slug($unslug->title);
                $unslug->saveQuietly();
            }
        });
    }

    public function loreTopics(): BelongsToMany {
        return $this->belongsToMany(LoreTopic::class);
    }

    public function loreSources(): BelongsToMany {
        return $this->belongsToMany(LoreSource::class)->orderBy("title", "ASC");
    }

    public function minis(): BelongsToMany {
        return $this->belongsToMany(Mini::class)->orderBy("name", "ASC");
    }
}
