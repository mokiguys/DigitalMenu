<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoRequest;
use App\Info;
use Exception as ExceptionAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Info $info)
    {
        $data['title'] = "ویرایش اطلاعات سایت";
        $data['info'] = $info;
        return view('admin.Info.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InfoRequest $request
     * @param Info $info
     * @return RedirectResponse
     * @throws ExceptionAlias
     */
    public function update(InfoRequest $request, Info $info)
    {
        $info->update([
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'address' => $request->address,
            'email' => $request->email,
            'tell' => $request->tell,
            'address_en' => $request->address_en,
        ]);
        alert()->success('با موفقیت ویرایش شد');
        return back();
    }

}
