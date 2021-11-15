<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Currency;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Http::get('http://api.nbp.pl/api/exchangerates/tables/a/')->json();

        for ($i = 0; $i < sizeof($currencies[0]['rates']); $i++){
            $currencyCode = $currencies[0]['rates'][$i]['code'];
            $currencysName = $currencies[0]['rates'][$i]['currency'];
            $currencyRate = $currencies[0]['rates'][$i]['mid'];
            
            if ($currencyRate == null){
                DB::table('currency')
                    ->update([
                        'name' => $currencysName,
                        'currency_code' => $currencyCode,
                        'exchange_rate' => $currencyRate
                    ]);

            } else {
                DB::table('currency')
                    ->insert([
                        'name' => $currencysName,
                        'currency_code' => $currencyCode,
                        'exchange_rate' => $currencyRate
                    ]);
            }
        }

        
        return view("currency");
    }
}
