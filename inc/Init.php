<?php declare(strict_types=1);

namespace MConqueror;

final class Init
{
    
    /**
     * Store all the classes inside an array
     *
     * @return array full list of classes
     */
    public static function getFiles() : array
    {
        return array(
            Classes\Setup::class,
            Classes\Enqueue::class,
        );
    }

    /**
     * Loop through the classes, initialize them
     * and call the register() method if exists
     *
     * @return
     */
    public static function registerFiles()
    {
        foreach (self::getFiles() as $file) {
            $file = self::instantiate($file);
            if (method_exists($file, 'register')) {
                $file->register();
            }
        }
    }

    /**
     * Initialize the classes
     *
     * @param class $class from the file array
     * @return class instance new instance of the new class
     */
    public static function instantiate($class)
    {
        return new $class;
    }
}
