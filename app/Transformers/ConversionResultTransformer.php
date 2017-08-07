<?php
namespace App\Transformers;

use App\ConversionResult;
use League\Fractal;

class ConversionResultTransformer extends Fractal\TransformerAbstract
{
	public function transform(ConversionResult $result)
	{
	    return [
			'id' => (int)$result['id'],
			'original_integer' => (int)$result['subject'],
			'converted_integer' => $result['result']
		];
	}
}