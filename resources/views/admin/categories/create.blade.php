@extends('admin.layouts.app')

@section('title')
إنشاء قسم جديد / خدمة
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>
                            إسم القسم
                        </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>
                            القسم الفرعى
                        </label>
                        <select name="parent_id" class="form-control">
                            <option value="">قسم رئيسى</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
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
