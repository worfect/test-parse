<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Offer;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

final class ParseXML extends Command
{
    /**
     * @var string
     */
    protected $signature = 'parser:xml {path? : The path to the file. Default - ./data_light.xml}';

    /**
     * @var string
     */
    protected $description = 'Parses XML-file and updates the data in the database';

    protected string $filePath = './data_light.xml';

    /**
     * @throws Throwable
     */
    public function handle(Offer $offer): int
    {
        $path = $this->argument('path');

        if (\is_string($path)) {
            $this->filePath = $path;
        }

        if (!file_exists($this->filePath)) {
            $this->error("XML file not found on path {$this->filePath}");
            return 1;
        }

        $xml = simplexml_load_file($this->filePath);

        if (!$xml->offers) {
            $this->error('The file does not contain required data');
            return 1;
        }

        $orderIds = [];

        DB::beginTransaction();

        try {
            foreach ($xml->offers->offer as $item) {
                $orderIds[] = $item->id;

                if (!$offer->where('order_id', $item->id)->exists()) {
                    $offer->addOffer($item);
                } else {
                    $offer->updateOffer($item);
                }
            }

            $offer->whereNotIn('order_id', $orderIds)->delete();
        } catch (Exception $e) {
            DB::rollback();

            $this->error('An error occurred while updating the data. The data has not been updated.');
            return 1;
        }

        DB::commit();

        $this->info('The data has been successfully updated.');
        return 0;
    }
}
