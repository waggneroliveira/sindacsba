<?php

namespace App\Http\Controllers;

use App\Models\SettingTheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingThemeController extends Controller
{
    
    public function setting(Request $request)
    {
        $settingTheme = SettingTheme::where('user_id', Auth::user()->id)->first();
        if(!$settingTheme){
            $settingTheme = new SettingTheme();
        }

        $settingTheme->data_bs_theme = $request->data_bs_theme;
        $settingTheme->data_layout_width = $request->data_layout_width;
        $settingTheme->data_layout_mode = $request->data_layout_mode;
        $settingTheme->data_topbar_color = $request->data_topbar_color;
        $settingTheme->data_menu_color = $request->data_menu_color;
        $settingTheme->data_two_column_color = $request->data_two_column_color;
        $settingTheme->data_menu_icon = $request->data_menu_icon;
        $settingTheme->data_sidenav_size = $request->data_sidenav_size;

        $settingTheme->save();
    }
    public function settingupdate(Request $request) {
        $settingTheme = SettingTheme::where('user_id', Auth::user()->id)->first();
        
        $request->validate([
            'data-bs-theme' => 'required|string',
        ]);
    
        $setting = SettingTheme::find($settingTheme->id); 
        $setting->data_bs_theme = $request->input('data-bs-theme');
        $setting->data_layout_width = $request->input('data-layout-width');
        $setting->data_layout_mode = $request->input('data-layout-mode');
        $setting->data_topbar_color = $request->input('data-topbar-color');
        $setting->data_menu_color = $request->input('data-menu-color');
        $setting->data_two_column_color = $request->input('data-two-column-color');
        $setting->data_menu_icon = $request->input('data-menu-icon');
        $setting->data_sidenav_size = $request->input('data-sidenav-size');
        $setting->save();
    
        return response()->json(['status' => true]);
    }
    
}
