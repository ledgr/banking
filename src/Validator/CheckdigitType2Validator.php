<?php

namespace byrokrat\banking\Validator;

use byrokrat\banking\Validator;
use byrokrat\banking\AccountNumber;

/**
 * Validate check digits for type 2 accounts
 */
class CheckdigitType2Validator implements Validator
{
    use Modulo10Trait;

    /**
     * Validate check digit
     *
     * Checksum calculation is made on the last ten digitsof the serial number.
     *
     * @param  AccountNumber $number
     * @return null
     */
    public function validate(AccountNumber $number)
    {
        $this->validateModulo10($number->getSerialNumber() . $number->getCheckDigit());
    }
}
