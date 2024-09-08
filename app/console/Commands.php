<?php 

namespace App\Console;

class Commands
{
    /**
     * Register commands
     * 
     * @param $console
     * @param bool $scan
     * 
     * More on commands:
     *  - switch scan to true and false to switch between 
     *    scanning for commands or manually registering them
     */
    public static function register($console, $scan=true): void
    {
        if ($scan){

            $commands = array_diff(scandir(__DIR__), ['.', '..', basename(__FILE__)]);
            $ignoredCommands = [
                # ExampleCommand::class,
            ];

            $commands = array_diff(array_map(function ($class) {
                return __NAMESPACE__ . '\\' . pathinfo($class, PATHINFO_FILENAME);
            }, $commands), $ignoredCommands);

        }else{
            $commands = [
                # 'ExampleCommand::class',
            ];
        }

        # register commands
        $console->register($commands);

    }
}