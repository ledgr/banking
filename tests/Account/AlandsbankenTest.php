<?php

namespace byrokrat\banking\Account;

/**
  * @covers \byrokrat\banking\Account\Alandsbanken
*/
class AlandsbankenTest extends AccountNumberTestCase
{
    public function getFormatId()
    {
        return 'Alandsbanken';
    }

    public function getClassName()
    {
        return '\byrokrat\banking\Account\Alandsbanken';
    }

    public function validProvider()
    {
        return [
            ['2300,1111133', '2300', '', '111113', '3'],
        ];
    }
}