<?php

namespace App\Http\Controllers;

use App\CategoryFood;
use App\Food;
use App\Http\Controllers\admin\Uploader;
use App\Ingredient;
use App\Menu;
use App\Shop;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MenuController extends Controller
{
    use Uploader;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function index(Request $request)
    {
//        auth user
        if (!auth()->check()) {
            return redirect()->intended('Sign');
        }
//        auth shop data
        if ($request->has('shop')) {
            $shop_id = $request->input('shop');
            if (auth()->user()->user_type === 'Marketer') {
                $search = auth()->id();
                $creator_Type = "Marketer";
            } elseif (auth()->user()->user_type === 'User') {
                $search = auth()->id();
                $creator_Type = "User";
            }
            $shop = Shop::where('id', $shop_id)->where('creatorType', $creator_Type)->where('creator_id', $search)->get();
            if ($shop->isEmpty()) {
                alert()->error('شما مجاز به ورود به این صفحه نمیباشید');
                if (auth()->user()->user_type === 'Marketer') {
                    return redirect()->intended('Marketer-panel');
                } elseif (auth()->user()->user_type === 'User') {
                    return redirect()->intended('User-panel');
                }
            }
        } else {
            if (auth()->user()->user_type === 'Marketer') {
                return redirect()->intended('Marketer-panel');
            } elseif (auth()->user()->user_type === 'User') {
                return redirect()->intended('User-panel');
            }
        }
        $data['food'] = Food::where('categoryShop_id', $shop[0]->category_id)->get();
        $data['CategoryFood'] = CategoryFood::where('categoryShop_id', $shop[0]->category_id)->get();
        $data['Ingredient'] = Ingredient::all();
        $data['menu'] = Menu::where('shop_id', $request->input('shop'))->get();
        if(auth()->check() && auth()->user()->user_type == "User"){
            $data['shopNames'] = Shop::where('user_id',auth()->id())->where('confirmAdmin',1)->get();
        }
        return view('site.menu_list', compact('data'));
    }

    public function check_exist_ingredients(Request $request)
    {
        $result = Ingredient::where(app()->getLocale(), $request->tag)->get();
        if ($result->isEmpty()) {
            Ingredient::create([
                app()->getLocale() => $request->tag
            ]);
        }
    }

    public function check_food(Request $request)
    {
        $result = Food::where(app()->getLocale(), $request->name)->get();
        if ($result->isNotEmpty()) {
            $data = $result[0]->ingredients()->pluck(app()->getLocale());
        }
        echo json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $file_name = $request->image;
        $file_path = 'site/uploader/menu';
        $file = $this->FileUploader($file_name, $file_path);
        $lang = app()->getLocale();
        $food = Food::where($lang,$request->name)->get();
        $menu = Menu::create([
            $lang => $request->name,
            'shop_id' => $request->shop_id,
            'price' => $request->price,
            'currency' => $request->currency,
            'discount' => $request->discount,
            'exist' => $request->exist,
            'category_id' => $request->category,
            'image' => $file,
            'description_' . $lang => $request->description
        ]);
        if($food->isNotEmpty()){
            $menu->update([
               'fa' => $food[0]->fa,
               'en' => $food[0]->en,
               'tr' => $food[0]->tr,
            ]);
        }
        $tags = $request->tags;
        $tags = explode('|', $tags);
        $tags_id = array();
        foreach ($tags as $item) {
            $result = Ingredient::where($lang, $item)->get();
            array_push($tags_id, $result[0]->id);
        }
        $menu->ingredients()->attach($tags_id);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت اضافه شد' : 'Successfully added');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     * @return Response
     */
    public function edit(Request $request)
    {
        $data['menu'] = Menu::where('id',$request->user_menu)->get();
        $shop = Shop::where('id', $data['menu'][0]->shop_id)->get();
        $data['food'] = Food::where('categoryShop_id', $shop[0]->category_id)->get();
        $data['CategoryFood'] = CategoryFood::where('categoryShop_id', $shop[0]->category_id)->get();
        $data['Ingredient'] = Ingredient::all();
        $data['IngredientSaved'] = $data['menu'][0]->ingredients;
        $data['Ingredients'] = "";
        foreach($data['IngredientSaved'] as $item){
            $data['Ingredients'] .= $item[app()->getLocale()] . "|";
        }
        $data['Ingredients'] = rtrim($data['Ingredients'],"|");
        return view('site.menu_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Menu $menu
     * @return Response
     */
    public function update(Request $request, Menu $user_menu)
    {
        $file_path = 'site/uploader/menu/';
        $inputImage = $request->image;
        $DbImage = $user_menu->image;
        $file = $this->FileUpdate($inputImage, $DbImage, $file_path);
        $lang = app()->getLocale();
        $user_menu->update([
            'fa' =>  $request['name_fa'],
            'en' =>  $request['name_en'],
            'tr' =>  $request['name_tr'],
            'description_fa' =>  $request['description_fa'],
            'description_en' =>  $request['description_en'],
            'description_tr' =>  $request['description_tr'],
            'image' => $file,
            'price' => $request->price,
            'currency' => $request->currency,
            'discount' => $request->discount,
            'exist' => $request->exist,
            'category_id' => $request->category,
        ]);
        $tags = $request->tags;
        $tags = explode('|', $tags);
        $tags_id = array();
        foreach ($tags as $item) {
            $result = Ingredient::where($lang, $item)->get();
            array_push($tags_id, $result[0]->id);
        }
        $user_menu->ingredients()->sync($tags_id);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $menu
     * @return Response
     */
    public function destroy(Menu $user_menu)
    {
        $path = 'site/uploader/menu/' . $user_menu->image;
        $this->FileDelete($path);
        $user_menu->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}
