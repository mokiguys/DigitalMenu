<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'user_id', 'creatorType', 'confirmAdmin', 'freePlan', 'plan', 'expire_day', 'creator_id','enable_tax','service_charge',
        'fa', 'en', 'tr', 'email', 'edit_lock', 'menu_lock', 'subtitle_fa', 'subtitle_en', 'subtitle_tr', 'AddressShop',
        'location', 'address_fa', 'address_en', 'address_tr', 'country_id', 'province_id', 'city_id', 'category_id',
        'description_fa', 'description_en', 'description_tr', 'logo', 'main_image', 'video_link', 'tell', 'fax',
        'phone', 'WhatsApp', 'website', 'instagram', 'facebook', 'twitter', 'telegram', 'youtube', 'external_link',
        'finish_time', 'clock', 'gallery_image1', 'gallery_image2', 'gallery_image3', 'gallery_image4', 'gallery_image5', 'stop'
    ];

    public function CategoryStore()
    {
        return $this->belongsTo(CategoryStore::class, 'category_id');
    }

    public function Cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function Users()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenities::class);
    }

    public function Menus()
    {
        return $this->belongsTo(Menu::class,'shop_id');
    }
}
