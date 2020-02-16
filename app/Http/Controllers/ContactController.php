<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Http\Requests\ContactStoreRequest;
use App\Photo;
use App\PhotoType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact', [
            'categories' => Category::parents()->get(),
            'photosTypes' => PhotoType::$allowedTypes,
        ]);
    }

    public function store(ContactStoreRequest $request)
    {
        $contact = Contact::create([
            'name' => $request->name,
            'activity_type' => $request->activity_type,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'photos_count' => $request->photos_count,
            'file_path' => $request->file('file_path')->store('contacts'),
        ]);

        if(count($request->categories_ids)) {
           foreach($request->categories_ids as $id) {
               DB::table('contact_categories')->insert([
                   'category_id' => $id,
                   'contact_id' => $contact->id,
               ]);
           }
        }

        if($request->category) {
            DB::table('contact_categories')->insert([
                'category' => $request->category,
                'contact_id' => $contact->id,
            ]);
        }

        foreach($request->photos_types as $key) {
            $contact->photosTypes()->create([
                'photo_type' => PhotoType::$allowedTypes[$key]
            ]);
        }

        return back()->withSuccess('تم ارسال رسالتك الينا بنجاح');
    }
}
