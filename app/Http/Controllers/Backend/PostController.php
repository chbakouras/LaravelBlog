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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $posts = $this->postRepository
            ->eagerLoadAllPaginated(
                array('categories', 'author'),
                Input::all());

        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'type' => Input::get('type'),
            'author_id' => Auth::user()->id,
        ];
        //TODO: Auto generate slug and excerpt with a service or an event - handler
        //TODO: Auto upload images from article links - Create an Upload controller? or a service?
        $post = $this->postRepository->create($data);

        $this->postRepository
            ->syncCategories(
                $post->id,
                Input::has('categoryId') ? Input::get('categoryId') : array($this->optionRepository->findOptionIntegerValueByName('default-category-id')));

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

        return view('admin.posts.edit')
            ->with('post', $post);
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
            'type' => Input::get('type'),
        );

        $this->postRepository->update($data, $id);

        $this->postRepository
            ->syncCategories(
                $id,
                Input::has('categoryId') ? Input::get('categoryId') : $this->optionRepository->findOptionIntegerValueByName('default-category-id'));

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
        $this->postRepository->forceDelete($id);

        return redirect()->back();
    }

    /**
     * Soft Delete the resource
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function softDelete($id)
    {
        $this->postRepository->softDelete($id);

        return redirect()->back();
    }
}