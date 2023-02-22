<?php

namespace Francerz\MxClabe\Tests;

use Francerz\MxClabe\Clabe;
use PHPUnit\Framework\TestCase;

class ClabeTest extends TestCase
{
    public function testEsValida()
    {
        $clabe = new Clabe('032180000118359719');
        $this->assertTrue($clabe->esValida());
        $this->assertEquals('032', $clabe->getCodigoBanco());
        $this->assertEquals('180', $clabe->getCodigoPlaza());
        $this->assertEquals('00011835971', $clabe->getNumeroCuenta());

        $clabe = new Clabe('032180000318359719');
        $this->assertFalse($clabe->esValida());
    }
}
