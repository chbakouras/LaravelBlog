<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\Controllers\System;


use App\Http\Controllers\Controller;
use App\Repositories\System\OptionRepository;

class AdminController extends Controller
{
    protected $optionRepository;

    /**
     * Create a new controller instance.
     *
     * @param OptionRepository $optionRepository
     * @internal param PostRepository $postRepository
     */
    public function __construct(OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }

    /**
     * Display the admin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $siteName = $this->optionRepository->findOptionStringValueByName('site-name');

        return view('admin.dashboard')->with('siteName', $siteName);
    }
}