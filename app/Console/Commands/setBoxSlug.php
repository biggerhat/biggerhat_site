<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Box;
use Illuminate\Support\Str;

class setBoxSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slug:box {--box=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets a slug for a specific box or all boxes.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $boxOption = $this->option('box');
        if ($boxOption != "all") {
            $boxs = Box::where('id', $boxOption)->get();
        } else {
            $boxs = Box::all();
        }
        foreach ($boxs as $box) {
            $box->slug = Str::slug($box->name, '-');
            $box->saveQuietly();
        }
    }
}
