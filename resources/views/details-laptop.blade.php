@extends('layout')
@section('title', $laptop->acf->Title)

@section('content')
  <div class="card" style="width: 18rem; display: inline-block;">
     {{--<img class="card-img-top" src="{{$item->acf->Image('image')->url}}" alt="Card image cap">--}}

      @include('wp4laravel::picture', [
      'picture' => $laptop->acf->Image('image'),
      'breakpoints' => [
          '(min-width: 768px)' => 'overview_desktop',
          '(max-width: 767px)' => 'overview_mobile',
         ],
       ])

     <div class="card-body">
         <h5 class="card-title">{{$laptop->acf->Title}}</h5>
         <p class="card-text">{{$laptop->acf->Description}}</p>
         <a href="{{$laptop->url}}" class="btn btn-primary">Go somewhere</a>
     </div>
 </div>
@endsection

