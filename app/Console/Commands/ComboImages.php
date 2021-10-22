<?php

namespace App\Console\Commands;

use App\Models\Promo;
use Illuminate\Console\Command;

class ComboImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:combo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates combo images for any promos that do not have them.';

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
        $promos = Promo::where('combo', null)->orderBy('name')->limit(25)->get();
        foreach ($promos as $card) {
            $frontUrl =
                "https://biggerhat.net/storage/" . str_replace("\\", "/", $card->front);
            $backUrl =
                "https://biggerhat.net/storage/" . str_replace("\\", "/", $card->back);

            list($widthFront, $heightFront) = getimagesize($frontUrl);
            list($widthBack, $heightBack) = getimagesize($backUrl);
            $background = imagecreatetruecolor($widthFront + $widthBack, $heightFront);

            header('Content-Type: image/jpeg');
            $outputImage = $background;

            $frontUrl = imagecreatefromjpeg($frontUrl);
            $backUrl = imagecreatefromjpeg($backUrl);

            imagecopymerge($outputImage, $frontUrl, 0, 0, 0, 0, $widthFront, $heightFront, 100);
            imagecopymerge($outputImage, $backUrl, $widthFront, 0, 0, 0, $widthBack, $heightBack, 100);


            $comboName = uniqidReal() . '.jpg';
            $comboUrl = 'cards\combos\\' . $comboName;

            imagejpeg($outputImage, storage_path() . "/app/public/cards/combos/" . $comboName);
            imagedestroy($outputImage);
            $card->combo = $comboUrl;
            $card->saveQuietly();
        }
        echo "Job's Done";
    }
}
