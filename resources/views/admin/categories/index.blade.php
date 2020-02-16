@extends('admin.layouts.app')

@section('title')
الأقسام
@endsection

@section('content')
    <div class="container">
        <a href="{{route('categories.create')}}" class="btn btn-success">
            <i class="fa fa-plus"></i>
            انشاء قسم جديد
        </a>

        <a href="{{route('photos.create')}}" class="btn btn-success">
            <i class="fa fa-plus"></i>
            رفع صورة
        </a>
        <hr>
        <div class="row">

            @forelse($categories as $category)
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            {{$category->name}}

                            <form style="display: inline; float: left" method="post" action="{{route('categories.destroy', $category)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <hr>
                        <div class="box-body">
                            @forelse($category->subcategories as $sub)
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{route('categories.show', $sub)}}">
                                            {{$sub->name}} | {{$sub->photos()->count()}} صورة
                                        </a>
                                        <form style="display: inline; float: left" method="post" action="{{route('categories.destroy', $sub)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            @empty
                            <div class="alert alert-danger">
                                لايوجد اقسام فرعية فى ذلك القسم
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">
                    لايوجد اقسام حتى الان
                    <a href="{{route('categories.create')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i>
                        إنشاء قسم جديد
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
