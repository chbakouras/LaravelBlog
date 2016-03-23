<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\ViewComposers\Backend;


use App\Repositories\System\CategoryRepository;
use Illuminate\View\View;

class PostCategoriesComposer
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        if($view->post) {
            $postCategories = $view->post->categories->lists('id')->all();
        } else {
            $postCategories = [];
        }

        $view
            ->with('categories', $this->categoryRepository->all())
            ->with('postCategories', $postCategories);
    }
}