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
        $this->assertEquals('11835971', $clabe->getNumeroCuenta());

        $clabe = new Clabe('032180000318359719');
        $this->assertFalse($clabe->esValida());

        $clabe = new Clabe('002090012306543212');
        $this->assertTrue($clabe->esValida());
        $this->assertEquals('002', $clabe->getCodigoBanco());
        $this->assertEquals('090', $clabe->getCodigoPlaza());
        $this->assertEquals('123654321', $clabe->getNumeroCuenta());
    }
}
