<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Ramiromd\RssSdk\Package;

/**
 * Undocumented class
 * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
 * @since 1.0.0
 * @covers Ramiromd\RssSdk\Package
 */
final class PackageTest extends TestCase
{
    /**
     * Verifica la carga de clases PSR-4
     * @author Ramiro Martínez D'Elía <ramiro.md90@gmail.com>
     * @since 1.0.0
     * @return void
     */
    public function testPSR4Autoload()
    {
        $this->assertEquals('Rss SDK', Package::NAME);
    }
}