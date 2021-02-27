<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Resource;
use Illuminate\Support\Str;

class setResourceSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slug:resource {--resource=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets a resource slug when a resource is changed or created.';

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
        $resourceOption = $this->option('resource');
        if ($resourceOption != "all") {
            $resources = Resource::where('id', $resourceOption)->get();
        } else {
            $resources = Resource::all();
        }
        foreach ($resources as $resource) {
            $resource->slug = Str::slug($resource->name, '-');
            $resource->saveQuietly();
        }
    }
}
