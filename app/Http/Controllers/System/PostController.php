<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\System\CategoryRepository;
use App\Repositories\System\OptionRepository;
use App\Repositories\System\PostRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;
    protected $optionRepository;

    /**
     * Create a new controller instance.
     *
     * @param  PostRepository $postRepository
     * @param OptionRepository $optionRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(PostRepository $postRepository, OptionRepository $optionRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->optionRepository = $optionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->eagerLoadAllPaginated(array('categories', 'author'));

        return view('admin.posts.index')->with('posts', $posts);
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

        return view('theme.posts.show')
            ->with('post', $post)
            ->with($this->getOptions($post->type));
    }

    /**
     * @param $categorySlug
     * @param $postSlug
     * @return mixed
     */
    public function showPostWithSlugs($categorySlug, $postSlug)
    {
        $posts = $this->categoryRepository->getPostsBySlug($categorySlug);
        $post = $this->findPostWithSlug($posts, $postSlug);

        return view('theme.posts.show')
            ->with('post', $post)
            ->with($this->getOptions($post->type));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->eagerLoadOne('categories', $id);
        $categories = $this->categoryRepository->all();

        return view('admin.posts.edit')
            ->with('post', $post)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        );

        // TODO: update all Post data + categories + author.
        $this->postRepository->update($data, $id);
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

    /**
     * Find the post with this slug.
     *
     * @param $posts
     * @param $postSlug
     * @return Post
     */
    private function findPostWithSlug($posts, $postSlug)
    {
        foreach ($posts as $post)
        {
            if ($post->slug === $postSlug)
            {
                return $post;
            }
        }

        return null;
    }

    private function getOptions($postType)
    {
        return array(
            'sidebarRight'  => $this->optionRepository->findOptionBooleanValueByName($postType . '-sidebar-right'),
            'sidebarLeft'   => $this->optionRepository->findOptionBooleanValueByName($postType . '-sidebar-left')
        );
    }
}
