<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\ViewComposers;


use App\Repositories\System\OptionRepository;
use Illuminate\View\View;

class AdminHeaderComposer
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
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('siteName', $this->optionRepository->findOptionStringValueByName('site-name'));
    }
}