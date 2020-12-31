<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $lang = $request->language;

        if ($lang != 'en' && $lang != 'vi') {
            $lang = config('app.locale');
        }
        session()->put('language', $lang);

        return redirect()->back();
    }
}
