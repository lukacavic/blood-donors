<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function swap($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}