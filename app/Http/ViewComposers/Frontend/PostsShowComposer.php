<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\ViewComposers\Frontend;


use App\Repositories\System\OptionRepository;
use Illuminate\View\View;

class PostsShowComposer
{
    /**
     * The user repository implementation.
     *
     * @var OptionRepository
     */
    protected $optionRepository;

    /**
     * Create a new profile composer.
     *
     * @param  OptionRepository $optionRepository
     */
    public function __construct(OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(
            'sidebarRight',
            $this->optionRepository
                ->findOptionBooleanValueByName($view->post->type . '-sidebar-right')
        )->with(
            'sidebarLeft',
            $this->optionRepository
                ->findOptionBooleanValueByName($view->post->type . '-sidebar-left')
        );
    }
}