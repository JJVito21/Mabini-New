@extends('layouts.layout')

@section('content')
@include('navbars.navbar')
<div class="mb-40">

<section>
    <div class="container mt-20 md:mt-36"">

        <div style="height: 100vh;">
          <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=UTC&bgcolor=%23ffffff&src=bGFnZ2VyLjAxMjFAZ21haWwuY29t&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZmFtaWx5MDYxNjYzMjY4MjA2NDg4OTcxNzhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=ZW4ucGhpbGlwcGluZXMjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%2333B679&color=%23E4C441&color=%230B8043&lang=en" style="border:solid 1px #777; height: 100%; width: 100%;" frameborder="0" scrolling="no"></iframe>
        </div>
</div>
</section>

</div>
@include('footer.footer')

@endsection
