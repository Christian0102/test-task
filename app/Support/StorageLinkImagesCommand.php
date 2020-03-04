<?php


namespace App\Support;

//namespace Illuminate\Foundation\Console;

use Illuminate\Console\Command;

class StorageLinkImagesCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'storage:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link from "public/storage" to "storage/app/logo"';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (file_exists(public_path('storage'))) {
            return $this->error('The "public/storage" directory already exists.');
        }

        $this->laravel->make('files')->link(
            storage_path('app/logo'), public_path('storage')
        );

        $this->info('The [public/storage] directory has been linked.');
    }
}
