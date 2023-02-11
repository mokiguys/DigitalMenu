<?php

namespace App\Http\Controllers\admin;

use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param Currency $currency
     * @return void
     */
    public function edit(Currency $currency)
    {
        $data['currency'] = $currency;
        return view('admin.Currency.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Currency $currency
     * @return void
     */
    public function update(Request $request, Currency $currency)
    {
        Currency::where('id',1)->update([
           'usd' => $request->usd,
           'try' => $request->try,
           'key' => $request->key,
           'percentage' => $request->percentage,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت بروزرسانی شد' : 'Successfully Updated');
        return back();
    }

    public function UpdateCurrencyAuto()
    {
        $curreny_db = Currency::where('id',1)->get();
        $curreny = Http::get('http://api.navasan.tech/latest/?api_key='.$curreny_db[0]->key);
        $curreny = $curreny->json();
        Currency::where('id',1)->update([
            'usd' => $curreny['usd']['value'],
            'try' => $curreny['try']['value']
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت بروزرسانی شد' : 'Successfully Updated');
        return back();
    }
}
