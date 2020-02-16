@extends('admin.layouts.app')

@section('title')
رفع صورة جديدة
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>
                            إسم القسم
                        </label>
                        <input type="file" class="form-control" name="path">
                    </div>
                    <div class="form-group">
                        <label>
                            القسم
                        </label>
                        @if(!count($categories))
                            <div class="alert alert-danger">
                                لايوجد اقسام حتى الان
                                <a href="{{route('categories.create')}}" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i>
                                    إنشاء قسم جديد
                                </a>
                            </div>
                        @else
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <optgroup label="{{$category->name}}">
                                        @foreach($category->subcategories as $sub)
                                            <option value="{{$sub->id}}">{{$sub->name}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            إنشاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
