<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

    }
    public function setting()
    {

           $timezones = json_decode(file_get_contents(resource_path('views/admin/includes/timezone.json')));
           $setting = Setting::first();
           $site= Setting::first();
           return view('admin.setting.general', compact('timezones','site','setting'));
     }

     public function settingUpdate(Request $request)
     {
         $request->validate([
             'site_name'      => 'required|max:100',
            //  'currency_text'  => 'required|max:10',
            //  'curreny_symbol' => 'required|max:5',
            //  'timezone'       => 'required|max:50',
         ]);

            Setting::query()->first()->update([
             'site_name'      => $request->site_name,
            //  'currency_text'  => $request->currency_text,
            //  'currency_symbol' => $request->curreny_symbol,
            //  'timezone'       => $request->timezone,

         ]);

          return response()->json(['message' => 'General setting updated successfully']);
     }
    public function logoIcon()
    {
        $logoIcon = Setting::first();
        return view('admin.setting.logo_icon',compact('logoIcon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logoIconUpdate(Request $request)
    {

        $request->validate([
            'logo'          => ['nullable','image',image_allowed_extensions()],
            // 'dark_logo'     => ['nullable','image',image_allowed_extensions()],
            'favicon'       => ['nullable','image','mimes:ico,png'],
            'default_image' => ['nullable','image',image_allowed_extensions()],
        ]);

        $general = Setting::query()->first();
        $general->update([
            'logo'          => $request->hasFile('logo') ? file_upload($request->logo, 'logoIcon', $general->logo) : $general->logo,
            //'dark_logo'     => $request->hasFile('dark_logo') ? file_upload($request->dark_logo, 'logoIcon', $general->dark_logo) : $general->dark_logo,
            'favicon'       => $request->hasFile('favicon') ? file_upload($request->favicon, 'logoIcon', $general->favicon) : $general->favicon,
            'default_image' => $request->hasFile('default_image') ? file_upload($request->default_image, 'logoIcon', $general->default_image) : $general->default_image,
         ]);

         return response()->json(['message' => 'Logo icon updated successfully']);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

