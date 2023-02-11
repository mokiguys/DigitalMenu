<?php

namespace App\Http\Controllers\admin;

use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\Sitemap\SitemapGenerator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','AccessAdmin']);

    }

    public function index()
    {
        $data['title'] = "داشبورد";
        return view('admin.index',compact('data'));
    }

    public function SiteMap()
    {
        ini_set('max_execution_time', 900);
        SitemapGenerator::create('http://localhost:8000/')->writeToFile('sitemap.xml');
        alert()->success('با موفقیت ایجاد شد');
        return back();
    }
}
