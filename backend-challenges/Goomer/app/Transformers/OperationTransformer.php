<?php

namespace App\Transformers;

use App\Entities\Operation;
use Flugg\Responder\Transformers\Transformer;

class OperationTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\Entities\Operation $operation
     * @return array
     */
    public function transform(Operation $operation)
    {
        return [
            'id' => (int) $operation->id,
        ];
    }
}
