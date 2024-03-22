<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|min:3|string',
            'description' => 'required|min:3|string',
            'contact' => 'required|numeric',
            'whatsapp' => 'required|numeric',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for logo
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for icon
        ]);

        $setting = Setting::first();

        if ($request->hasfile('logo')) {
            $validateData['logo'] = $request->logo->store('public/setting');
            if ($setting->logo) {
                Storage::delete($setting->logo);
            }
        } else {
            // Keep existing logo if no new logo is uploaded
            $validateData['logo'] = $setting->logo;
        }

        if ($request->hasfile('icon')) {
            // Store the new icon
            $validateData['icon'] = $request->icon->store('public/setting');

            // Check if the old icon exists and delete it
            if ($setting->icon) {
                Storage::delete($setting->icon);
            }
        } else {
            $validateData['icon'] = $setting->icon; // Keep existing icon if no upload
        }


        $setting->update($validateData);

        return back();
    }
}
