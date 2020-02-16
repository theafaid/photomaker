@extends('layouts.app')

@push('styles')
    <style>
        input[type="file"] {
            padding: 0;
        }

        .black-box.margin-bottom {
            margin: 0 0 15px;
        }

        .checkbox-holder {
            font-weight: 100;
            position: relative;
            cursor: pointer;
            margin-bottom: 10px;
            display: block;
        }

        .checkbox-holder span {
            vertical-align: middle;
        }

        .checkbox-holder .checkbox-icon {
            width: 13px;
            height: 13px;
            line-height: 7px;
            display: inline-block;
            border: 1px solid #000;
            background: #000;
            text-align: center;
            margin: 0 4px;
        }

        .checkbox-holder input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkbox-holder .checkbox-icon:after {
            content: '';
            background: #000;
            width: 7px;
            height: 7px;
            display: block;
            margin: 2px;
        }

        .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon {
            border-color: #00bcd4;
        }

        .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon:after {
            background: #00bcd4;
        }

        .main-label {
            border-bottom: 1px dashed #00bcd4;
        }

        .check-open {
            margin-top: 10px;
        }
    </style>
@endpush

@section('title')
    تواصل معنا
@endsection

@section('content')
    <div class="fixed-bg">
        <img src="images/1.jpg">
    </div>
    <div class="main-content">
        <div class="container">
            <h1 class="main-heading">تواصل معنا</h1>

            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    @include('admin.layouts.partials.messages')
                    <form enctype="multipart/form-data" method="post" action="{{route('contacts.store')}}">
                        @csrf
                        <input type="text" placeholder="الاسم / الشركة" name="name">
                        <input type="text" placeholder="نوع النشاط" name="activity_type">
                        <input type="tel" placeholder="رقم التواصل" name="contact_phone">
                        <input type="email" placeholder="البريد الإلكتروني" name="contact_email">


                        <label>نوع الخدمة</label>

                        <div class="row">

                            @foreach($categories as $category)
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="box black-box margin-bottom">
                                        <div class="main-label">
                                            <label class="checkbox-holder">
                                                <input type="checkbox">
                                                <span class="checkbox-icon"></span>
                                                <span>{{$category->name}}</span>
                                            </label>
                                        </div>
                                        <div class="check-open">

                                            @foreach($category->subcategories as $sub)
                                                <label class="checkbox-holder">
                                                    <input type="checkbox" name="categories_ids[]" value="{{$sub->id}}">
                                                    <span class="checkbox-icon"></span>
                                                    <span>{{$sub->name}}</span>
                                                </label>
                                            @endforeach

                                            <label class="checkbox-holder">
                                                <input type="checkbox">
                                                <span class="checkbox-icon"></span>
                                                <span> (يرجى التحديد )أخرى </span>
                                            </label>

                                                <input type="text" name="category">

                                                <label>عدد الصور</label>
                                                <input type="number" name="photos_count" value="1" placeholder="عدد الصور">

                                                @foreach($photosTypes as $index => $type)
                                                    <label class="checkbox-holder">
                                                        <input type="checkbox" name="photos_types[]" value="{{$index}}">
                                                        <span class="checkbox-icon"></span>
                                                        <span>{{$type}}</span>
                                                    </label>
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <label>إرفاق ملف</label>
                        <input type="file" placeholder="إرفاق ملف" name="file_path">
                        <div class="btn btn-white btn-block">
                            <input type="submit" value="إرسال">
                        </div>
                    </form>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="box black-box text-center">
                        <h3 class="main-heading">تفاصل الاتصال</h3>

                        <p><i class="fa fa-envelope-o right-fa"></i> {{site('email')}}</p>
                        <p><i class="fa fa-phone right-fa"></i> {{site('phone')}}</p>
                    </div>
                    <div class="box black-box text-center">
                        <h3 class="main-heading">إشترك معنا</h3>

                        <form>
                            <input type="email" placeholder="بريدك الالكتروني">
                            <div class="btn btn-white btn-block">
                                <span><input type="submit" value="إشترك معنا"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function (){
            $('.check-open').slideUp(0);

            $('.main-label .checkbox-holder').click(function (){
                if($(this).find('input').is(':checked')) {
                    $(this).parents('.main-label').next('.check-open').stop().slideDown();
                } else {
                    $(this).parents('.main-label').next('.check-open').stop().slideUp();
                }
            });
        });
    </script>
@endpush
