<?php

namespace App\Http\Controllers;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Component
{
    public function lang()
    {
        return view('lang');
    }

    public function lang_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('lang_code', $request->lang);
        return redirect()->back();
    }
}

