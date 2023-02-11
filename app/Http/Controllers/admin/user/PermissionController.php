<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function create(User $manager)
    {
        return view('admin.manager.permission',compact('manager'));
    }

    public function store(Request $request,User $manager)
    {
        $manager->permissions()->sync($request->permissions);
        $manager->roles()->sync($request->roles);

        alert()->success('با موفقیت انجام شد');
        return back();
    }
}
