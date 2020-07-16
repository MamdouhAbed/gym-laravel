<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Notifications\Channels\DatabaseChannel;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
use Input;
use Redirect,Response;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function updateSettingsView()
    {
        $title='إعدادات النظام';
        $settings=Settings::first();
        return view('cpanel.settings',compact('settings','title'));
    }

    public function updateSettings(Request $request){
        if(!File::isDirectory(public_path() . '/uploads/logo/')) {
            File::makeDirectory(public_path() . '/uploads/logo/', 0777, true);
        }

        $this->validate($request, [
            'name' => 'required',
            'male_paid' => 'required',
            'female_paid' => 'required',
        ], [
            'name.required' => 'الرجاء إدخال اسم الجيم',
            'male_paid.required' => 'الرجاء إدخال قيمة الدفع',
            'female_paid.required' => 'الرجاء إدخال قيمة الدفع',
        ]);
        $settings=Settings::first();
        $settings->name = $request->name;
        $settings->male_paid = $request->male_paid;
        $settings->female_paid = $request->female_paid;

        $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:9048',
        ]);

        /* Start upload img */
        if (isset($request->img)) {
            $settings_img = time() . '.' . $request->img->extension();
                $img = Image::make($request->img->getRealPath());
                $img->save(public_path('uploads/logo/'.$settings_img) ) ;
            $settings->img = 'uploads/logo/' . $settings_img;

        }
        /* End upload img */

        $settings->updated_by=auth::user()->id;
        $settings->update();

        return redirect('/updatesettings')->with('success',true);

    }


}
