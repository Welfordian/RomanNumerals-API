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
        $converted_integer = $converter->toRomanNumerals($integer); // Convert the integer

        $results = [$converter->store()]; // Save the result and return it back
        $transformed_result = $this->transform($results, new ConversionResultTransformer); // Transform the result for 

        return $transformed_result;
    }

    public function showTop()
    {
        $results = ConversionResult::topTen();
        $transformed_results = $this->transform($results, new ConversionResultTransformer);

        return $transformed_results;
    }

    public function showRecent()
    {
        $results = ConversionResult::recent();
        $transformed_results = $this->transform($results, new ConversionResultTransformer);

        return $transformed_results;
    }
}
