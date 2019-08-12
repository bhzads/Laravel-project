@extends('layout')
@section('title', $desktop->acf->Title)

@section('content')
  <div class="card" style="width: 18rem; display: inline-block;">
     {{--<img class="card-img-top" src="{{$item->acf->Image('image')->url}}" alt="Card image cap">--}}

      @include('wp4laravel::picture', [
      'picture' => $desktop->acf->Image('image'),
      'breakpoints' => [
          '(min-width: 768px)' => 'overview_desktop',
          '(max-width: 767px)' => 'overview_mobile',
         ],
       ])

     <div class="card-body">
         <h5 class="card-title">{{$desktop->acf->Title}}</h5>
         <p class="card-text">{{$desktop->acf->Description}}</p>
         <a href="{{$desktop->url}}" class="btn btn-primary">Go somewhere</a>
     </div>
 </div>
@endsection

