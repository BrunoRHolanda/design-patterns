<?php

namespace App\Transformers;

use App\Entities\Category;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Collection;

class CategoryTransformer extends Transformer
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
     * @var Collection
     */
    private $fields;

    public function __construct(Collection $fields = null)
    {
        if (is_null($fields)) {
            $this->fields = new Collection(['default' => '*']);
        }

        $this->fields = $fields;
    }

    /**
     * Transform the model.
     *
     * @param Category $category
     * @return array
     */
    public function transform(Category $category)
    {
        $response = collect([
            'id' => $category->getId(),
            'description' => $category->getDescription(),
        ]);

        return $response->filter(function ($value, $field) {
            return $this->fields->contains($field);
        })->toArray();
    }
}
