@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($cafeCards as $cafeCard)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{'storage/'. $cafeCard->preview_image}}" alt="blog post">
                            </div>
                            <a href="{{route('cafeShow.show' , $cafeCard->id)}}"  class="blog-post-permalink">
                                <h4>{{$cafeCard->title}}</h4></a>
                            <p>{!! $cafeCard->content !!}</p>
                            <p>{{$cafeCard->location}}</p>
                            <p>@if($cafeCard->phone != Null)
                                +{{$cafeCard->phone}}
                                @else
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection
