<?php

namespace App\Http\Controllers;

use App\ConversionResult;
use App\IntegerConversion;
use Illuminate\Http\Request;
use App\Transformers\Transformable;
use App\Transformers\ConversionResultTransformer;

class ApiController extends Controller
{
    use Transformable;

    public function convert(IntegerConversion $converter, $integer)
    {
        $converted_integer = $converter->toRomanNumerals($integer); // Convert the integer to Roman numerals

        $results = [$converter->store()]; // Save the result and return it back
        $transformed_result = $this->transform($results, new ConversionResultTransformer); // Transform the result

        return $transformed_result; // Return as is
    }

    public function showTop()
    {
        $results = ConversionResult::topTen(); // Grab the top ten results
        $transformed_results = $this->transform($results, new ConversionResultTransformer); // Transform the result

        return $transformed_results; // Return as is
    }

    public function showRecent()
    {
        $results = ConversionResult::recent(); // Grab the top fifty results
        $transformed_results = $this->transform($results, new ConversionResultTransformer); // Transform the result

        return $transformed_results; // Return as is
    }
}
