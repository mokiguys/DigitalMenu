<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Role;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Response|View
     */
    public function index()
    {
        $data['roles'] = Role::latest()->paginate(20);
        return view('admin.roles.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255','unique:roles'],
            'label' => ['required','string','max:255'],
            'permissions' => ['required','array'],
        ]);
        $role = Role::create($data);
        $role->permissions()->sync($data['permissions']);
        alert()->success('با موفقیت ایجاد شد');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Factory|View
     */
    public function edit(Role $role)
    {
        $data['role'] = $role;
        return view('admin.roles.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255',Rule::unique('roles')->ignore($role->id)],
            'label' => ['required','string','max:255'],
            'permissions' => ['required','array'],
        ]);

        $role->update($data);
        $role->permissions()->sync($data['permissions']);
        alert()->success('با موفقیت ویرایش شد');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}
