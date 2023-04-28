<?php

namespace core;

class AutoLoader
{
    public function init()
    {
        spl_autoload_register([__CLASS__, 'loadClasses']);
    }

    /**
     * @param string $sourceDirectory
     * @return array
     */
    private function getAllSubDir($sourceDirectory)
    {
        $directories = [$sourceDirectory];
        foreach (@scandir($sourceDirectory) as $fileName) {
            if (in_array($fileName, ['.', '..'])) continue;
            $path = $sourceDirectory . '/' . $fileName;
            if (!@is_dir($path)) continue;
            $directories = array_merge($directories, $this->getAllSubDir($path));
        }
        return $directories;
    }

    /**
     * @param $className
     * @return void
     */
    private function loadClasses($className)
    {
        $directories = array_merge(
            $this->getAllSubDir(__DIR__ . '/../src'),
            $this->getAllSubDir(__DIR__)
        );
        foreach ($directories as $directory) {
            $files = @scandir($directory);
            foreach ($files as $file) {
                if (!@is_dir($file)) {
                    if (substr($className . '.php', -strlen($file)) !== $file) {
                        continue;
                    }
                    $file = $directory . '/' . $file;
                    if (strpos($file, '.php') !== false) {
                        require_once $file;
                    }
                }
            }
        }
    }
}