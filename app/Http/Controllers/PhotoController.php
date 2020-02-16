<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PhotoStoreRequest;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(PhotoStoreRequest $request)
    {
        $photo = Photo::create([
            'category_id' => $request->category_id,
            'path' => request()->file('path')->store('photos'),
        ]);

        return redirect()
            ->route('categories.show', $photo->category)
            ->withSuccess(__('site.created'));
    }

    public function create()
    {
        return view('admin.photos.create', [
            'categories' => Category::parents()->get()
        ]);
    }

    public function destroy(Photo $photo)
    {
        Storage::delete($photo->path);

        $photo->delete();

        return back()->withSuccess('تم حذف الصورة بنجاح');
    }
}
