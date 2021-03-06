<?php

declare(strict_types=1);

namespace byrokrat\banking\Format\Build;

/**
 * This class has been auto-generated and should not be edited directly
 *
 * Generated in accordance with BGC specifications dated 2020-04-15.
 */
class NordeaPersonalFormatTest extends \PHPUnit\Framework\TestCase
{
    private function getAccount(): \byrokrat\banking\AccountNumber
    {
        return new \byrokrat\banking\UndefinedAccount("", "3300", "", "111111111", "6");
    }

    public function testGetBankName()
    {
        $this->assertSame(
            \byrokrat\banking\BankNames::BANK_NORDEA,
            (new NordeaPersonalFormat())->getBankName()
        );
    }

    public function testIsValidClearing()
    {
        $this->assertTrue(
            (new NordeaPersonalFormat())->isValidClearing(
                $this->getAccount()
            )
        );
    }

    public function testValidate()
    {
        $this->assertTrue(
            (new NordeaPersonalFormat())->validate($this->getAccount())->isValid()
        );
    }
}
