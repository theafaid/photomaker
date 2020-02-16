@extends('admin.layouts.app')

@section('title')
    {{$category->name}} عرض
@endsection

@section('content')
    <div class="container">
        <a href="{{route('categories.create')}}" class="btn btn-success">
            <i class="fa fa-plus"></i>
            انشاء قسم جديد
        </a>
        <hr>
        <div class="row">
            <h3>{{$category->photos->count()}} عدد الصور : </h3>
            @foreach($category->photos as $photo)
                <div class="col-md-4">
                    <form class="form-group" method="post" action="{{route('photos.destroy', $photo)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    <a href="{{asset('storage/' . $photo->path)}}" target="_blank">
                        <img src="{{asset('storage/' . $photo->path)}}" width="300" height="300">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
