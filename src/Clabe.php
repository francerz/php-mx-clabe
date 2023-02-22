<?php

namespace Francerz\MxClabe;

class Clabe
{
    public const PATTERN_REGEXP = '/^[0-9]{18}$/';

    private $clabe;

    public function __construct(string $clabe)
    {
        $this->clabe = $clabe;
    }

    public static function calcularUltimoDigito(string $clabe)
    {
        $s = [3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7];
        $suma = 0;
        for ($i = 0; $i < 17; $i++) {
            $dig = substr($clabe, $i, 1);
            $suma += $dig * $s[$i] % 10;
        }
        return (10 - ($suma % 10)) % 10;
    }

    public static function verificarUltimoDigito(string $clabe)
    {
        $actual = (string)static::calcularUltimoDigito($clabe);
        $expected = substr($clabe, -1);
        return $actual == $expected;
    }

    public function getCodigoBanco()
    {
        return substr($this->clabe, 0, 3);
    }

    public function getCodigoPlaza()
    {
        return substr($this->clabe, 3, 3);
    }

    public function getNumeroCuenta()
    {
        return substr($this->clabe, 6, 11);
    }

    public function esValida()
    {
        $match = preg_match(static::PATTERN_REGEXP, $this->clabe);
        if ($match == false) {
            return false;
        }
        return static::verificarUltimoDigito($this->clabe);
    }

    public function __toString()
    {
        return $this->clabe;
    }
}
