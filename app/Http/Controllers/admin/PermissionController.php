<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Response|View
     */
    public function index()
    {
        $data['permissions'] = Permission::latest()->paginate(20);
        return view('admin.permission.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|Response|View
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Factory|RedirectResponse|Response|View
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'name' => ['required','string','max:255','unique:permissions'],
           'label' => ['required','string','max:255'],
        ]);
        Permission::create($data);
        alert()->success('با موفقیت ایجاد شد');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return Factory|Response|View
     */
    public function edit(Permission $permission)
    {
        $data['permission'] = $permission;
        return view('admin.permission.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Permission $permission
     * @return RedirectResponse|Response
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255',Rule::unique('permissions')->ignore($permission->id)],
            'label' => ['required','string','max:255'],
        ]);

        $permission->update($data);
        alert()->success('با موفقیت ویرایش شد');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}
