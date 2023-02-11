<?php

namespace App\Http\Controllers;

use App\Amenities;
use App\CategoryStore;
use App\Country;
use App\Http\Controllers\admin\Uploader;
use App\Payment;
use App\Plans;
use App\Shop;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ZanySoft\Zip\Zip;

class BusinessController extends Controller
{
    use Uploader;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function business_create(Request $request)
    {
        if (!auth()->check()) {
            alert()->error('ابتدا در سایت ثبت نام کنید', 'اخطار');
            return redirect('Sign');
        }
        $plans = array('Free', 'Standard', 'Premium');
        if (!in_array($request->business, $plans)) {
            alert()->error('لطفا در روند ثبت نام اختلال ایجاد نکنید');
            return redirect(route('plans'));
        }
        $data['categoryStore'] = CategoryStore::all();
        $data['country'] = Country::all();
        if(auth()->check() && auth()->user()->user_type == "User"){
            $data['shopNames'] = Shop::where('user_id',auth()->id())->where('confirmAdmin',1)->get();
        }
        return view('Site.add_shop', compact('data'));
    }

    public function business_store(Request $request)
    {
        if (!auth()->check()) {
            alert()->error('ابتدا در سایت ثبت نام کنید', 'اخطار');
            return redirect('Sign');
        }
        $plans = array('Free', 'Standard', 'Premium');
        if (!in_array($request->type, $plans)) {
            alert()->error('لطفا در روند ثبت نام اختلال ایجاد نکنید');
            return redirect(route('plans'));
        }
        $typePlan = $request->type == "Free" ? 1 : ($request->type == "Standard" ? 2 : 3);
        $expire = Plans::where('plan', $typePlan)->get();
        if (auth()->user()->user_type == 'Marketer') {
            $fullname = $request->fullname;
            $email = $request->email;
            $password = $request->password;
            $user = \App\User::create([
                'name' => $fullname,
                'email' => $email,
                'password' => Hash::make($password),
                'user_type' => 'User',
                'confirm_admin' => 0,
                'Introduced' => auth()->user()->name
            ]);
        }
        if (auth()->user()->user_type == 'Marketer') {
            $email_business = $request->email;
        } else {
            $email_business = $request->custom_email;
        }
        $shop = Shop::create([
            'creatorType' => auth()->user()->user_type == "User" ? "User" : "Marketer",
            'confirmAdmin' => 0,
            'freePlan' => 1,
            'plan' => $typePlan,
            'finish_time' => $expire[0]->expireTime,
            'expire_day' => $expire[0]->expireTime,
            'user_id' => auth()->user()->user_type == 'Marketer' ? $user->id : auth()->id(),
            'creator_id' => auth()->id(),
            app()->getLocale() => $request->title,
            'category_id' => $request->category_id,
            'country_id' => $request->country,
            'province_id' => $request->province,
            'city_id' => $request->city,
            'email' => $email_business,
            'clock' => '10:00//18:00**10:00//18:00**10:00//18:00**10:00//18:00**10:00//18:00**10:00//13:00**0//12:00',
        ]);
//        cerate qr code
        mkdir('site/uploader/Qrcode/' . $shop->id);
        $renderer = new ImageRenderer(
            new RendererStyle(400, 1),
            new ImagickImageBackEnd()
        );
        $writer = new Writer($renderer);
        $writer->writeFile(route('shop.menu', ['category' => $shop->CategoryStore['slug'], 'detail' => str_replace(" ", '-', $shop->fa)]), 'site/uploader/Qrcode/' . $shop->id . '/public.png');
//        end
        $price = app()->getLocale() == "fa" ? $expire[0]->rial : (app()->getLocale() == "en" ? $expire[0]->dollar : $expire[0]->lir);
        $price_end = $price - ($price * $expire[0]->discount) / 100;
        Payment::create([
            'user_id' => auth()->user()->user_type == 'Marketer' ? $user->id : auth()->id(),
            'shop_id' => $shop->id,
            'marketer_id' => $shop->creator_id,
            'plan' => $typePlan,
            'bank_type' => 0,
            'bank_order' => '-',
            'price' => $price_end,
            'discount' => $expire[0]->discount,
            'status_order' => $typePlan == 1 ? 1 : 0,
            'typePayment' => 1,
            'currency' => app()->getLocale() == "fa" ? 1 : (app()->getLocale() == "en" ? 2 : 3)
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت اضافه شد' : 'Successfully added');
        return redirect(auth()->user()->user_type == 'User' ? "User-panel" : 'Marketer-panel');
    }

    public function business_edit(Shop $business)
    {
        $data['business'] = $business;
        $data['amenities'] = Amenities::all();
        if(auth()->check() && auth()->user()->user_type == "User"){
            $data['shopNames'] = Shop::where('user_id',auth()->id())->where('confirmAdmin',1)->get();
        }
        return view('site.edit_shop', compact('data'));
    }

    public function business_update(Request $request, Shop $business)
    {

        $file_path = 'site/uploader/shop/';
//        logo
        $inputImage = $request->logo;
        $DbImage = $business->logo;
        $logo = $this->FileUpdate($inputImage, $DbImage, $file_path);
//        gallery image
        $inputImage = $request->image_gallery_1;
        $DbImage = $business->gallery_image1;
        $gallery_image1 = $this->FileUpdate($inputImage, $DbImage, $file_path);
        $inputImage = $request->image_gallery_2;
        $DbImage = $business->gallery_image2;
        $gallery_image2 = $this->FileUpdate($inputImage, $DbImage, $file_path);
        $inputImage = $request->image_gallery_3;
        $DbImage = $business->gallery_image3;
        $gallery_image3 = $this->FileUpdate($inputImage, $DbImage, $file_path);
        $inputImage = $request->image_gallery_4;
        $DbImage = $business->gallery_image4;
        $gallery_image4 = $this->FileUpdate($inputImage, $DbImage, $file_path);
        $inputImage = $request->image_gallery_5;
        $DbImage = $business->gallery_image5;
        $gallery_image5 = $this->FileUpdate($inputImage, $DbImage, $file_path);
//        main image
        $inputImage = $request->main_image;
        $DbImage = $business->main_image;
        $main_image = $this->FileUpdate($inputImage, $DbImage, $file_path);
//        clock
        $clock = $request->operation_hours_saturday . "//" . $request->operation_hours_close_saturday . "**" . $request->operation_hours_open_sunday . "//" . $request->operation_hours_close_sunday . "**" . $request->operation_hours_monday . "//" . $request->operation_hours_close_monday . "**" . $request->operation_hours_tuesday . "//" . $request->operation_hours_close_tuesday . "**" . $request->operation_hours_wednesday . "//" . $request->operation_hours_close_wednesday . "**" . $request->operation_hours_thursday . "//" . $request->operation_hours_close_thursday . "**" . $request->operation_hours_friday . "//" . $request->operation_hours_close_friday;
//        external link
        $title_link = $request->title_link;
        $link = $request->link;
        $external_link = "";
        foreach ($title_link as $key => $value) {
            $external_link .= $value . "!!!" . $link [$key] . "***";
        }
        $external_link = rtrim($external_link, '***');
        $business->update([
            $request->lang => $request->title,
            'email' => $request->email,
            'subtitle_' . $request->lang => $request->subtitle,
            'AddressShop' => $request->AddressShop,
            'location' => $request->location,
            'address_' . $request->lang => $request->address,
            'description_' . $request->lang => $request->description,
            'logo' => $logo,
            'main_image' => $main_image,
            'gallery_image1' => $gallery_image1,
            'gallery_image2' => $gallery_image2,
            'gallery_image3' => $gallery_image3,
            'gallery_image4' => $gallery_image4,
            'gallery_image5' => $gallery_image5,
            'video_link' => $request->video_link,
            'tell' => $request->tell,
            'fax' => $request->fax,
            'phone' => $request->phone,
            'WhatsApp' => $request->whatsapp,
            'website' => $request->website,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'telegram' => $request->telegram,
            'youtube' => $request->youtube,
            'external_link' => $external_link,
            'clock' => $clock,
        ]);
        $amenities = $request->amenities;
        $business->amenities()->sync($amenities);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return redirect(auth()->user()->user_type === 'Marketer' ? 'Marketer-panel' : 'User-panel');
    }

    public function Deactive_shop(Request $request, Shop $business)
    {
        if (auth()->id() != $business->user_id) {
            return false;
        }
        $business->update([
            'stop' => $request->stop
        ]);
        if ($request->stop == 0) {
            alert()->success('با موفقیت غیر فعال شد');
        } else {
            alert()->success('با موفقیت فعال شد');
        }

        return back();
    }

    public function Qrcode_generator(Request $request)
    {

        $table = $request->input('table');
        $shop = $request->input('shop');
        $data_shop = Shop::find($shop);
        for ($i = 1; $i <= $table; $i++) {
            $renderer = new ImageRenderer(
                new RendererStyle(400, 1),
                new ImagickImageBackEnd()
            );
            $writer = new Writer($renderer);
            $writer->writeFile(route('shop.menu', ['category' => $data_shop->CategoryStore['slug'], 'detail' => str_replace(" ", '-', $data_shop->fa), 'table' => $i]), 'site/uploader/Qrcode/' . $data_shop->id . '/table' . $i . '.png');
        }
        $zip = Zip::create('site/uploader/Qrcode/' . $data_shop->id . '/' . $data_shop->id . '.zip'); // create zip
        $zip->add('site/uploader/Qrcode/' . $data_shop->id.'/'); // add public path to the zip file
        echo "done";
    }

    public function enable_tax(Request $request)
    {
        $shop_id = $request->shop;
        $shop = Shop::find($shop_id);
        if($shop->enable_tax == 1){
            $tax = 0;
        }else{
            $tax = 1;
        }
        $shop->update([
           'enable_tax' => $tax
        ]);
        echo "done";
    }

    public function service_charge(Request $request)
    {
        $shop_id = $request->shop;
        $price = $request->price;
        $shop = Shop::find($shop_id);
        $shop->update([
            'service_charge' => $price
        ]);
        echo "done";
    }
}
