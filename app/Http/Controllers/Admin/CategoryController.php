<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', 0)->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->parent_id){{
            $request->validate([
                'parent_id' => 'exists:categories,id'
            ]);
         }}

     $request->validate([
            'name' => 'required',
        ]);


        Category::create([
            'name' => $request->name,
            'parent_id' => $request ->parent_id ?? 0
        ]);

        return redirect(route('admin.categories.index'));

        alert()->success('دسته بندی مورد نظر با موفقیت ثبت شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {



        // if($request->parent_id){{
        //     $request->validate([
        //         'parent_id' => 'exists:categories,id'
        //     ]);
        //  }}

        $data = $request->validate([
            'name' => 'required',
            'parent_id' => 'required',
        ]);

        $category->update($data);
        return redirect(route('admin.categories.index'));
        alert()->success('دسته بندی مورد نظر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
        alert()->success('کامنت مورد نظر با موفقیت حذف شد');
    }
}
