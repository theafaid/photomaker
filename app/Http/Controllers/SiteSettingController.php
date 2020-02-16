<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteSettingsUpdateRequest;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function show()
    {
        return view('admin.settings.show');
    }

    public function update(SiteSettingsUpdateRequest $request)
    {

    }
}
