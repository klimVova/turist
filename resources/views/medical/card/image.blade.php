@extends('medical.layouts.main')
@section('content')
    <label for="exampleInputFile">Добавить главное изображение</label>
    <div class="content-wrapper">
    <div class="ml-3" >
        <div class="row" style="margin:0;">
            @foreach($images as $image)
                <div class="col-12 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img class="img-thumbnail" style="height: 30vh;" src="{{ url('storage/medical_card_images/' . $image->images )}}" alt="main_image">
                        <form action="{{route('medical.card.image_remove', $image->id )}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent" >
                                <button class="btn btn-danger" role="button">Удалить</button>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="form-group w-50 ml-4">
            <form action="{{route('medical.card.image_store', $medicalCard->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group w-50">
                    <label for="exampleInputFile">Добавить главное изображение</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" multiple name="main_image[]">
                            <label class="custom-file-label">Выберите изображение</label>
                        </div>
                    </div>
                    @error('main_image')
                    <div class="text-danger">Это поле необходимо заполнить</div>
                    @enderror
                </div>
                <div class="form-group w-50">
                    <input type="hidden" name="user_id" value="{{$user}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </div>
            </form>
            @error('main_image')
            <div class="text-danger">Это поле необходимо заполнить</div>
            @enderror
        </div>
    </div>
    </div>
@endsection
