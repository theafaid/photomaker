@extends('admin.layouts.app')

@section('title')
تعديل القسم ({{$category->name}})
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{route('categories.update', $category)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>
                            إسم القسم
                        </label>
                        <input type="text" class="form-control" name="name" value="{{old('name') ?: $category->name}}">
                    </div>
                    <div class="form-group">
                        <label>
                            القسم الفرعى
                        </label>
                        <select name="parent_id" class="form-control">
                            <option value="" @if(old('parent_id') == "" || $category->parent_id == null) selected @endif>قسم رئيسى</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}" @if(old('parent_id') == $c->id || $category->parent_id == $c->id) selected @endif>{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            تعديل
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
