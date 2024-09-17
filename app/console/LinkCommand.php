<?php

namespace App\Console;

use Aloe\Command;
class LinkCommand extends Command

{
    protected static $defaultName = 'link';
    public $description = 'Create a symbolic link for the storage directory';
    public $help = 'Create a symbolic link for the storage directory';

    protected function config()
    {
        
    }

    protected function handle()
    {
        $this->writeln('');
        $this->info('Creating symbolic link for storage directory...');
        
        $publicPath = getcwd() . '/public';
        $storagePath = getcwd() . '/storage/app/public';

        if (!file_exists($storagePath)) {
            $this->error('Storage directory does not exist');
            return;
        }

        if (!file_exists($publicPath)) {
            $this->error('Public directory does not exist');
            return;
        }

        $this->writeln('');

        if (file_exists("$publicPath/storage")) {
            $this->error('Symbolic link already exists');
            return;
        }

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {

            // convert forward slashes to backslashes
            $publicPath = str_replace('/', '\\', $publicPath);
            $storagePath = str_replace('/', '\\', $storagePath);

            $this->writeln(asComment("Experimental: "). "This command is experimental and may not work on Windows");
            $this->writeln(shell_exec("mklink /J $publicPath\\storage $storagePath"));
            
        }else{
            $this->writeln(shell_exec("ln -s $storagePath $publicPath/storage"));
        }

        $this->info(PHP_EOL.'Symbolic link created successfully');
    }
}