<?php

namespace App\Http\Views;

use App\Models\Category;

class CategoryViewComposer
{
    public function __construct(
        protected Category $category
    ) {
    }

    public function compose($view)
    {
        return $view->with('categories', $this->category->all(['name', 'slug', 'id']));
    }
}
