<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Ramiromd\RssSdk\Sources\Http;
use Ramiromd\RssSdk\Sources\SourceException;
use Ramiromd\RssSdk\Sources\Contract;

/**
 * Undocumented class
 * 
 * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
 * @since 1.0.0
 */
final class DsHttpTest extends TestCase
{
    private $ds;

    public function setUp(): void
    {
        parent::setUp();
        $this->ds = new Http();
    }

    /**
     * Verifica que la implementacion del DS, sea la 
     * correcta.
     *
     * @covers Ramiromd\RssSdk\Sources\Contract
     * @return void
     */
    public function testImplementation()
    {
        $this->assertInstanceOf(Contract::class, $this->ds);
    }

    /**
     * Verifica que una fuente de datos no disponible,
     * lance la excepcion adecuada.
     * 
     * @covers Ramiromd\RssSdk\Sources\Http
     * @covers Ramiromd\RssSdk\Sources\SourceException
     * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
     * @return void
     */
    public function testUnavailableSource()
    {
        $this->expectException(SourceException::class);
        $location = 'http://dummy-page.com.da'; 
        $this->ds->fetch($location);
    }

    /**
     * Verifica que una fuente de datos disponible,
     * retorne un contenido no vacio.
     * 
     * @covers Ramiromd\RssSdk\Sources\Http
     * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
     * @return void
     */
    public function testAvailableSource()
    {
        $location = 'http://contenidos.lanacion.com.ar/herramientas/rss/origen=2'; 
        $content = $this->ds->fetch($location);
        $this->assertTrue(!empty($content));
    }
}