<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Plans;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $data['plan'] = Plans::all();
        return view('admin.Plans.list',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Plans $plan
     * @return Factory|View
     */
    public function edit(Plans $plan)
    {
        $data['plan'] = $plan;
        return view('admin.Plans.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Plans $plan
     * @return RedirectResponse|Response
     */
    public function update(Request $request, Plans $plan)
    {
        $plan->update([
            'roles_fa' => $request->roles_fa,
            'roles_en' => $request->roles_en,
            'roles_tr' => $request->roles_tr,
            'expireTime' => $request->expireTime,
            'rial' => $request->rial,
            'discount' => $request->discount,
            'dollar' => $request->dollar,
            'lir' => $request->lira,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

}
