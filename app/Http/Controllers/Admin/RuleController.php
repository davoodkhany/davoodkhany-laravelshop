<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Rule as RuleModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $rules = RuleModel::query();

        if( $keyword = $request->search){
            $rules = RuleModel::where('name', "LIKE", "%$keyword%")->orWhere('label', "LIKE", "%$keyword%")->paginate(10);
        }

        $rules = $rules->latest()->paginate(10);

        return view('admin.rule.all', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RuleModel $rule)
    {

        $data = $request->validate([
            'name' => ['required','max:255', ValidationRule::unique('rules')->ignore($rule->id)],
            'label' => ['required','string','max:255']
        ]);

        $rule->create($data);

        alert()->success('مقام مورد نظر با موفقیت ثبت شد');

        return redirect(route('admin.rule.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(RuleModel $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit(RuleModel $rule)
    {
        return view('admin.rule.edit', ['rule' => $rule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RuleModel $rule)
    {
        $data = $request->validate([
            'name' => ['required','max:255', ValidationRule::unique('rules')->ignore($rule->id)],
            'label' => ['required','string','max:255']
        ]);

        $rule->update($data);

        alert()->success('مقام مورد نظر با موفقیت ویرایش شد.');

        return redirect(route('admin.rule.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function destroy(RuleModel $rule)
    {

        $rule->delete();

        alert()->success('مقام مورد نظر با موفقیت حذف شد');

        return back();

    }
}
