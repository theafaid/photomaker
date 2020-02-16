<footer class="navbar-fixed-bottom text-center">
    <div class="container">

        <p>جميع الحقوق محفوظة ل{{site('name')}}  &copy; {{date('Y')}} </p>

        @if($fbLink = site('facebook'))
            <a href="{{$fbLink}}"><i class="fa fa-facebook"></i></a>
        @endif
        @if($twitterLink = site('twitter'))
            <a href="$twitterLink"><i class="fa fa-twitter"></i></a>
        @endif
        @if($instaLink = site('instagram'))
            <a href="{{$instaLink}}"><i class="fa fa-instagram"></i></a>
        @endif
        @if($gpLink = site('google_plus'))
            <a href="{{$gpLink}}"><i class="fa fa-google_plus"></i></a>
        @endif
    </div>
</footer>
