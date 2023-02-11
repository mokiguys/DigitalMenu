<?php

namespace App\Http\Controllers;

use App\FoodComment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FoodComemnt extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'text' => 'required',
            'food_id' => 'required',
            'shop_id' => 'required',
        ]);

        FoodComment::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'comment' => $validatedData['text'],
            'food_id' => $request->food_id,
            'shop_id' => $request->shop_id,
        ]);
        alert()->success(__('text.success_store_message'));
        return back();
    }

    public function submit(Request $request)
    {
        $comment_id = $request->comemnt_id;
        $comemnt = FoodComment::find($comment_id);
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
        $comemnts = FoodComment::where('food_id',$food_id)->where('submit',1)->get();
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
