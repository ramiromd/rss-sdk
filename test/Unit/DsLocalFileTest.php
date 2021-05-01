<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Ramiromd\RssSdk\Sources\LocalFile;
use Ramiromd\RssSdk\Sources\SourceException;
use Ramiromd\RssSdk\Sources\Contract;

/**
 * Undocumented class
 * 
 * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
 * @since 1.0.0
 */
final class DsLocalFileTest extends TestCase
{
    private $ds;

    public function setUp(): void
    {
        parent::setUp();
        $this->ds = new LocalFile();
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
     * @covers Ramiromd\RssSdk\Sources\LocalFile
     * @covers Ramiromd\RssSdk\Sources\SourceException
     * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
     * @return void
     */
    public function testUnavailableSource()
    {
        $this->expectException(SourceException::class);
        $location = './some-file.xml'; 
        $this->ds->fetch($location);
    }

    /**
     * Verifica que una fuente de datos disponible,
     * retorne un contenido no vacio.
     * 
     * @covers Ramiromd\RssSdk\Sources\LocalFile
     * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
     * @return void
     */
    public function testAvailableSource()
    {
        $location = __DIR__. '/../stub/note.xml'; 
        $content = $this->ds->fetch($location);
        $this->assertXmlStringEqualsXmlFile($location, $content);
    }
}