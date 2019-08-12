@extends('layout')
@section('title', 'Home')

@section('content')
    <div>
        {{$page->meta->header_title}}<hr>
        {{--<img class="card-img-top" src="{{$page->acf->Image('header_image')->url}}" alt="Card image cap" style="background-color: grey; height: 10rem;">--}}
    </div>
@foreach($all as $item)
  <div class="card" style="width: 18rem; display: inline-block;">
     {{--<img class="card-img-top" src="{{$item->acf->Image('image')->url}}" alt="Card image cap">--}}
      @include('wp4laravel::picture', [
      'picture' => $item->acf->Image('image'),
      'breakpoints' => [
          '(min-width: 768px)' => 'overview_desktop',
          '(max-width: 767px)' => 'overview_mobile',
         ],
       ])

     <div class="card-body">
         <h5 class="card-title">{{$item->meta->title}}</h5>
         <p class="card-text">{{$item->meta->description}}</p>
         <a href="{{$item->url}}" class="btn btn-primary">Go somewhere</a>
     </div>
 </div>
@endforeach
<hr>
    <div class="card-body" style="background-color: grey; width: 18rem;">
        <h5 class="card-title">Contact Us</h5>
        {{--{!! *** !!} this mean do not skip html tags && nl2br this mean write in block multe line--}}
        <h5 class="card-text">{!! nl2br($page->meta->contact)!!}</h5>
    </div>
@endsection

