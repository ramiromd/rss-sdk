<?php

namespace Ramiromd\RssSdk\Sources;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * Abstrae el acceso de un feed, almacenado en un archivo local.
 * 
 * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
 */
class Http implements Contract
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
        try {
            $client = new Client();
            $request = new Request('GET', $location);
            $response = $client->send($request, ['timeout' => 2]);
            return $response->getBody()->getContents();
        } catch (Exception $e) {
            throw new SourceException(SourceException::UNAVAILABLE);
        }
    }
}