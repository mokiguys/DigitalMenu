<?php

namespace App\Http\Controllers;

use App\BusinessComment as AppBusinessComment;
use Illuminate\Http\Request;

class BusinessComment extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'text' => 'required',
            'shop_id' => 'required',
        ]);

        AppBusinessComment::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'comment' => $validatedData['text'],
            'shop_id' => $request->shop_id,
        ]);
        alert()->success(__('text.success_store_message'));
        return back();
    }
}
