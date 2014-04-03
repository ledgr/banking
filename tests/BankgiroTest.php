<?php
/**
 * This file is part of ledgr/banking.
 *
 * Copyright (c) 2014 Hannes Forsgård
 *
 * ledgr/banking is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * ledgr/banking is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with ledgr/banking.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace ledgr\banking;

class BankgiroTest extends \PHPUnit_Framework_TestCase
{
    public function validProvider()
    {
        return array(
            array('5050-1055'),
            array('5897-5616'),
            array('784-8419'),
            array('5331-1338'),
            array('5645-2725'),
            array('5588-8077'),
            array('5694-8227'),
            array('5805-6201'),
        );
    }

    public function invalidCheckDigitProvider()
    {
        return array(
            array('5050-1050'),
            array('5897-5610'),
            array('784-8410'),
            array('5331-1330'),
            array('5645-2720'),
            array('5588-8070'),
            array('5694-8220'),
            array('5805-6200'),
        );
    }

    public function invalidStructuresProvider()
    {
        return array(
            array('-1234'),
            array('1-1234'),
            array('12-1234'),
            array('12345-1234'),
            array('123'),
            array('123-'),
            array('123-1'),
            array('123-12'),
            array('123-123'),
            array('123-12345'),
            array(''),
        );
    }

    /**
     * @expectedException \ledgr\banking\Exception\InvalidClearingException
     */
    public function testInvalidClearing()
    {
        new Bankgiro('1234,5805-6200');
    }

    /**
     * @dataProvider validProvider
     */
    public function testConstruct($num)
    {
        new Bankgiro($num);
        $this->assertTrue(true);
    }

    /**
     * @dataProvider invalidStructuresProvider
     * @expectedException \ledgr\banking\Exception\InvalidStructureException
     */
    public function testInvalidStructure($num)
    {
        new Bankgiro($num);
    }

    /**
     * @dataProvider invalidCheckDigitProvider
     * @expectedException \ledgr\banking\Exception\InvalidCheckDigitException
     */
    public function testInvalidCheckDigit($num)
    {
        new Bankgiro($num);
    }

    public function testToString()
    {
        $m = new Bankgiro('5050-1055');
        $this->assertEquals((string)$m, '5050-1055');
    }

    public function testGetType()
    {
        $m = new Bankgiro('5050-1055');
        $this->assertEquals($m->getType(), 'Bankgiro');
    }
}