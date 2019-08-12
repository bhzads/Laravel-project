@extends('layout')
@section('title', 'Desktop')

@section('content')
    <div class="card-body" style="border:lightblue solid;">
        <h6 class="card-text">{!! nl2br($page->meta->special_block)!!}</h6>
    </div>
<hr>
@foreach($desktop as $item)
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
         <h5 class="card-title">{{$item->acf->Title}}</h5>
         <p class="card-text">{{$item->acf->Description}}</p>
         <a href="{{$item->url}}" class="btn btn-primary">Read more</a>
     </div>
 </div>
@endforeach
@endsection

