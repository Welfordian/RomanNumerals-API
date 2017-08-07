<?php

namespace App;

use App\IntegerConversionInterface;

class IntegerConversion implements IntegerConversionInterface
{
    private $integer = false;
    private $result = false;
    private $romanMap = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    public function toRomanNumerals($integer)
    {
        $this->result = false;
        $this->integer = $integer;

        while($integer > 0) 
        { 
            foreach($this->romanMap as $glyph => $denom) 
            { 
                if($integer >= $denom) 
                { 
                    $integer -= $denom; 
                    $this->result .= $glyph; 
                    break; 
                } 
            } 
        } 

        return $this->result;
    }

    public function store()
    {
        $conversion = new ConversionResult([
            'subject' => $this->integer,
            'result'  => $this->result
        ]);
        
        $conversion->save();

        return $conversion;
    }
}