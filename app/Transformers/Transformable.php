<?php
namespace App\Transformers;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

trait Transformable
{
    public function transform($results, $transformer)
    {
        $fractal = new Manager();
        $resource = new Collection($results, $transformer);

        return $fractal->createData($resource)->toArray();
    }
}