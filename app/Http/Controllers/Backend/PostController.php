<?php
/**
 * @author Chrisostomos Bakouras.
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Repositories\System\CategoryRepository;
use App\Repositories\System\OptionRepository;
use App\Repositories\System\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $categories = $this->categoryRepository->all();

        return view('admin.posts.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => Input::get('title'),
            'content' => Input::get('content'),
            'author_id' => Auth::user()->id,
            'type' => 'post',
        ];

        $post = $this->postRepository->create($data);

        // TODO: pass category array
        $this->postRepository->syncCategories($post->id);

        return redirect('/admin/posts/' . $post->id . '/edit');
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
            ->with('post', $post);
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
        $post = $this->postRepository->update($data, $id);

        return redirect('/admin/posts/' . $id . '/edit');
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