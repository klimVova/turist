@extends('layouts.main')

@section('content')

    <main class="blog-post">
        <div class="container">
            <h4>{{$hostelCard->title}}</h4>
            @foreach($posts as $post)
                @if($post->deleted_at == NULL)
                    <div class="d-flex">
                        <div>
                            <img class="img-thumbnail" style="height: 30vh;"
                                 src="{{ url('storage/'.$post->hostel_preview_image )}}"  alt="main_image">
                        </div>
                        <div class="ml-3">
                            {{$post->id}}
                            <h2>{{$post->title}}</h2>
                            <p>{!! $post->content !!}</p>
                            <a href="{{route('hostelShow.images' , $post->id)}}"  class="btn btn-primary">
                               Фотки нормера
                            </a>
                        </div>
                    </div>
                    </tbody>
                @else
                @endif
            @endforeach
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($images as $image)
                        @dd($image)
                        <img class="img-thumbnail" style="height: 30vh;"
                             src="{{ url('storage/hostel_post_images/' . $image->images )}}" alt="main_image">
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
