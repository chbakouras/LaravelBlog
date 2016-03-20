<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\System\OptionRepository;
use App\Repositories\System\PostRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class PostController extends Controller
{
    protected $postRepository;
    protected $optionRepository;

    /**
     * Create a new controller instance.
     *
     * @param  PostRepository $postRepository
     * @param OptionRepository $optionRepository
     */
    public function __construct(PostRepository $postRepository, OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postRepository->find($id);

        $sidebarRight = $this->optionRepository->findOptionBooleanValueByName('post-sidebar-right');
        $sidebarLeft = $this->optionRepository->findOptionBooleanValueByName('post-sidebar-left');

        return view('theme.posts.show')
            ->with('post', $post)
            ->with('sidebarRight', $sidebarRight)
            ->with('sidebarLeft', $sidebarLeft);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
