<?php

namespace App\Http\Controllers;

use App\ShopComment;
use Illuminate\Http\Request;

class ShopCommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'text' => 'required',
            'rate_speed' => 'required',
            'rate_price' => 'required',
            'rate_quality' => 'required',
            'shop_id' => 'required',
        ]);
        $rate = $validatedData['rate_quality'] + $validatedData['rate_speed'] + $validatedData['rate_price'];
        $sum = $rate / 3;
        $sum = round ($sum , 1);
        ShopComment::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'comment' => $validatedData['text'],
            'rate_quality' => $validatedData['rate_quality'],
            'rate_speed' => $validatedData['rate_speed'],
            'rate_price' => $validatedData['rate_price'],
            'sum' => $sum,
            'shop_id' => $validatedData['shop_id'],
        ]);
        alert()->success(__('text.success_store_message'));
        return back();
    }

    public function submit(Request $request)
    {
        $comment_id = $request->comemnt_id;
        $comemnt = ShopComment::find($comment_id);
        if($comemnt->submit == 1){
            $submit = 0;
        }else{
            $submit = 1;
        }
        $comemnt->update([
            'submit' => $submit
        ]);
        echo "done";
    }

    public function GetComemnt(Request $request)
    {
        $food_id = $request->food_id;
        $comemnts = ShopComment::where('food_id',$food_id)->where('submit',1)->get();
        foreach ($comemnts as $key => $item){
            if(app()->getLocale() == "fa" || app()->getLocale() == "ar"){
                $comemnts[$key]->date = jdate($item->created_at)->format('%d %B %y');
            }else{
                $comemnts[$key]->date = date("d-m-Y", strtotime($item->created_at));
            }
        }
        echo json_encode($comemnts);
    }
}
