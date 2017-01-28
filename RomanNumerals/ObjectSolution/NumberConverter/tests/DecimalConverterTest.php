<?php

use Converter\Roman\Roman;

class RomanConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider cases
     *
     * @param $decimalValue
     * @param $romanValue
     */
    public function testConvertValue($decimalValue, $romanValue){
        $this->assertEquals($decimalValue, Roman::toArabic($romanValue));
    }

    public function cases()
    {
        return [
            [3450, 'MMMCDL'],
            [99, 'XCIX'],
            [29, 'XXIX'],
            [6, 'VI'],
            [4, 'IV'],
            [3, 'III'],
        ];
    }
}
