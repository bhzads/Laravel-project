@extends('layout')
@section('title', $telefoon->acf->Title)

@section('content')
  <div class="card" style="width: 18rem; display: inline-block;">
     {{--<img class="card-img-top" src="{{$item->acf->Image('image')->url}}" alt="Card image cap">--}}

      @include('wp4laravel::picture', [
      'picture' => $telefoon->acf->Image('image'),
      'breakpoints' => [
          '(min-width: 768px)' => 'overview_desktop',
          '(max-width: 767px)' => 'overview_mobile',
         ],
       ])

     <div class="card-body">
         <h5 class="card-title">{{$telefoon->acf->Title}}</h5>
         <p class="card-text">{{$telefoon->acf->Description}}</p>
         <a href="{{$telefoon->url}}" class="btn btn-primary">Go somewhere</a>
     </div>
 </div>
@endsection
