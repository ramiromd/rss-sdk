<?php

namespace Ramiromd\RssSdk\Sources;

/**
 * Contrato comun a todas las abstracciones de fuente de
 * datos.
 * 
 * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
 */
interface Contract
{
    /**
     * Retorna el contenido de un Feed.
     *
     * @param string $location
     * @throws SourceException
     * @return string
     */
    public function fetch(string $location): string;
    
}