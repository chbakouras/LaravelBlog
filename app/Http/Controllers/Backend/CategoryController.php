<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\System\CategoryRepository;
use App\Repositories\System\OptionRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $optionRepository;

    /**
     * Create a new controller instance.
     *
     * @param CategoryRepository $categoryRepository
     * @param OptionRepository $optionRepository
     */
    public function __construct(CategoryRepository $categoryRepository, OptionRepository $optionRepository)
    {
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
        $categories = $this->categoryRepository->findAllPaginated();

        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'slug' => Input::get('slug'),
            'name' => Input::get('name'),
            'description' => Input::get('description'),
        ];

        $category = $this->categoryRepository->create($data);

        return Redirect::to(route('admin.categories.edit', ['id' => $category->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('theme.categories.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('admin.categories.edit')
            ->with('category', $category);
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
        $data = array(
            'slug' => Input::get('slug'),
            'name' => Input::get('name'),
            'description' => Input::get('description'),
        );

        $this->categoryRepository->update($data, $id);

        return Redirect::to(route('admin.categories.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->optionRepository->findOptionIntegerValueByName('default-category-id') != $id){
            $this->categoryRepository
                ->syncPosts($id);

            $this->categoryRepository->destroy($id);
        }

        return redirect()->back();
    }
}
