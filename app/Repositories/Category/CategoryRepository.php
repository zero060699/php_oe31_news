<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function loadParent()
    {
        return $this->model->where('parent_id', config('number_format.parent_id'))->with('children')->get();
    }
}
