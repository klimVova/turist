<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            @foreach($items as $item)
                @if($id == $item['id'])
                    <h1 class="m-0">Карта категории {{$item['title']}}</h1>
                @else
                @endif
            @endforeach
        </div>
    </div>
</div>

