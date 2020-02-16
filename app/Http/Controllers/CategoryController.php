<?php
namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::parents()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => Category::parents()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.categories.create', [
            'categories' => Category::parents()->get()
        ]);
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());

        return redirect(route('categories.index'))
            ->withSuccess('تم إنشاء القسم بنجاح');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', [
            'category' => $category->load('photos'),
        ]);
    }

    public function update(Category $category, CategoryStoreRequest $request)
    {
        $category->update($request->validated());

        return redirect(route('categories.index'))
            ->withSuccess('تم تعديل القسم بنجاح');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        $category->photos->each(function ($photo) {
            Storage::delete($photo->path);
            $photo->delete();
        });

        return redirect(route('categories.index'))
            ->withSuccess('تم حذف القسم بنجاح يابا');
    }
}
