<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Response|View
     */
    public function index()
    {
        $data['manager'] = User::where('user_type', 'Admin')->paginate(20);
        return view('admin.manager.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.manager.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type' => 'Admin',
            'isSuperAdmin' => 0,
            'confirm_admin' => 1,
        ]);
        alert()->success('با موفقیت اضافه شد');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $manager
     * @return Factory|View
     */
    public function edit(User $manager)
    {
        return view('admin.manager.edit',compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $manager
     * @return RedirectResponse
     */
    public function update(Request $request, User $manager)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($manager->id)],
        ]);
        $manager->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
        alert()->success('با موفقیت ویرایش شد');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $manager
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $manager)
    {
        $manager->delete();
        alert()->success('با موفقیت حذف شد');
        return back();
    }

    public function UpdateBanManager(Request $request)
    {
        $id = $request->input('id');
        $user = User::where('id', $id)->get();
        if ($user[0]->ban == 0) {
            $ban = 1;
        } else {
            $ban = 0;
        }
        User::where('id', $id)->update([
            'ban' => $ban
        ]);
        echo "success";
    }

    public function editPasswordUser(User $manager)
    {
        $data['user'] = $manager;
        return view('admin.manager.password', compact('data'));
    }

    public function UpdatePasswordUser(Request $request, User $manager)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $manager->update([
            'password' => Hash::make($data['password']),
        ]);
        alert()->success('با موفقیت تغییر یافت');
        return back();
    }
}
