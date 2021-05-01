<?php

namespace Ramiromd\RssSdk\Sources;

/**
 * Abstrae el acceso de un feed, almacenado en un archivo local.
 * 
 * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
 */
class LocalFile implements Contract
{
    /**
     * Retorna el contenido de un Feed.
     *
     * @param string $location
     * @throws SourceException
     * @return string
     */
    public function fetch(string $location): string
    {
        if (!file_exists($location)) {
            throw new SourceException(SourceException::UNAVAILABLE);
        }

        return file_get_contents($location);
    }
}