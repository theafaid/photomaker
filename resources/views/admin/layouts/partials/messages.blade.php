@if(count($errors))
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            - {{$err}} <br>
        @endforeach
    </div>
@endif


@if($msg = session('success'))
    <div class="alert alert-success">{{$msg}}</div>
@endif

@if($msg = session('failed'))
    <div class="alert alert-danger">{{$msg}}</div>
@endif
