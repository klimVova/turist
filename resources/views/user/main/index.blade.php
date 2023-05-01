@extends('user.layouts.main')
@section('content')
    <div class="container-fluid main">
        <div class="office">
            <div class="section-label">
                <h2>Личный кабинет</h2>
                <hr>
            </div>
            <nav class="office-nav org-type-sort">
                <ul>
                    <li data-f="profile" class=" spisok">Личные денные</li>
                    <li data-f="cart" class="active spisok">Корзина</li>
                    <li data-f="promocodes" class="spisok">Промокоды</li>
                </ul>
            </nav>

            <div class="row profile hide box">
                <form action="{{route('user.main.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="profile-data">
                        <div class="profile-data-item">
                            <label>Фамилия</label>
                            <input class="edit-dis" type="text" name="surname" value="{{$user->surname}}">
                        </div>
                        <div class="profile-data-item">
                            <label>Имя</label>
                            <input class="edit-dis" type="text" name="name" value="{{$user->name}}">
                        </div>
                        <div class="profile-data-item">
                            <label>email</label>
                            <input class="edit-dis" type="text" name="email" value="{{$user->email}}">
                        </div>
                        <div class="profile-data-item">
                            <label>Пол</label>
                            <div class="radio">
                                @if($user->gender == 'men')
                                    <input class="edit-dis" type="radio" name="gender" value="men" checked="">
                                    <p>Мужской</p>
                                    <input class="edit-dis" type="radio" name="gender" value="women">
                                    <p>Женский</p>
                                @else
                                    <input class="edit-dis" type="radio" name="gender" value="men">
                                    <p>Мужской</p>
                                    <input class="edit-dis" type="radio" name="gender" value="women" checked="">
                                    <p>Женский</p>
                                @endif
                            </div>
                        </div>
                        <div class="profile-data-item">
                            <label>Возраст</label>
                            <input class="edit-dis" type="text" name="age" value="{{$user->age}}">
                        </div>
                        <div class="profile-data-item">
                            <label>Телефон</label>
                            @if($user->phone == '')
                                <input class="edit-dis" type="text" name="phone" placeholder="Номер телефона" value="">
                            @else
                                <input class="edit-dis" type="text" name="phone" value="{{$user->phone}}">
                            @endif
                        </div>
                        <div class="profile-data-item">
                            <label>Страна</label>
                            @if($user->user_district == null)
                                <input class="edit-dis" type="text" name="user_district" placeholder="Введите страну"
                                       value="">
                            @else
                                <input class="edit-dis" type="text" name="user_district"
                                       value="{{$user->user_district}}">
                            @endif
                        </div>
                        <div class="profile-data-item">
                            <label>Город</label>
                            @if($user->user_city == null)
                                <input class="edit-dis" type="text" name="user_city" placeholder="Введите город"
                                       value="">
                            @else
                                <input class="edit-dis" type="text" name="user_city" value="{{$user->user_city}}">
                            @endif
                        </div>
                    </div>
                    <div class="form-group w-50">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                    </div>
                    <div class="button">
                        <input
                            type="submit"
                            value="Сохранить изменения"
                        />
                    </div>
                </form>
            </div>

            <div class="cart row box ">
                <div class="col col-12 col-md-9">

                    <div class="cart-section">

                        @foreach($preOrders as $preOrder)
                            @if($preOrder->role == 'Мед.центр')
                                <div class="section-label">

                                    <h2 class="mt-5">
                                        Медецинский центр
                                    </h2>
                                    <hr>
                                </div>
                                <div class="rooms">
                                    <div class="rooms-item">
                                        <img src=" {{$preOrder->image_product}}">
                                        {{--                                {{json_decode($preOrder->products, true)['totalPrice']}}--}}
                                        <label class="name"> {{$preOrder->role}}<br>" {{$preOrder->name_product}}
                                            "</label>
                                        <ul class="service">
                                            @if((json_decode($preOrder->products, true)['productList']) !== null)
                                            @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                <li class="product_list">
                                                    <div class="product_item_header">{{$list['product']}}</div>
                                                    <span>{{$list['qty']}}</span>
                                                    <label class="cost">  {{$list['price']}}р</label>
                                                </li>

                                            @endforeach
                                            @else
                                            @endif
                                        </ul>
                                        <label class="date">  {{json_decode($preOrder->products, true)['date']}}</label>
                                        <form action="{{route('user.maim.delete', $preOrder->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            @elseif($preOrder->role == 'spa')
                                <div class="section-label">
                                    <h2 class="mt-5">
                                        CПА/БЬЮТИ
                                    </h2>
                                    <hr>
                                </div>
                                <div class="rooms">
                                    <div class="rooms-item">
                                        <img src=" {{$preOrder->image_product}}">
                                        {{--                                {{json_decode($preOrder->products, true)['totalPrice']}}--}}
                                        <label class="name"> {{$preOrder->role}}<br>" {{$preOrder->name_product}}
                                            "</label>
                                        <ul class="service">

                                            @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                <li class="product_list">
                                                    <div class="product_item_header">{{$list['product']}}</div>
                                                    <span>{{$list['qty']}}</span>
                                                    <label class="cost">  {{$list['price']}}р</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <label class="date">  {{json_decode($preOrder->products, true)['date']}}</label>
                                        <form action="{{route('user.maim.delete', $preOrder->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @elseif($preOrder->role == 'cafe')
                                <div class="section-label">
                                    <h2 class="mt-5">
                                        Кафе\Ресторан
                                    </h2>
                                    <hr>
                                </div>
                                <div class="rooms">
                                    <div class="rooms-item">
                                        <img src=" {{$preOrder->image_product}}">
                                        {{--                                {{json_decode($preOrder->products, true)['totalPrice']}}--}}
                                        <label class="name"> {{$preOrder->role}}<br>" {{$preOrder->name_product}}
                                            "</label>
                                        <ul class="service">
                                            @if((json_decode($preOrder->products, true)['productList']) !== null)
                                            @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                <li class="product_list">
                                                    <div class="product_item_header">{{$list['product']}}</div>
                                                    <span>{{$list['qty']}}</span>
                                                    <label class="cost">  {{$list['price']}}р</label>
                                                </li>
                                            @endforeach
                                            @else
                                            @endif
                                        </ul>
                                        <ul class="service">
                                            @if((json_decode($preOrder->products, true)['product']) !== null)
                                                @foreach((json_decode($preOrder->products, true)['product']) as $item)
                                                    <li class="product_list">
                                                        <div class="product_item_header">
                                                            <h5 class="text-bold">{{$item['cat']}}</h5>
                                                            <p>{{$item['product']}}</p>
                                                        </div>
                                                        <span>{{$item['qty']}}</span>
                                                        <label class="cost">  {{$item['price']}}р</label>
                                                    </li>
                                                @endforeach
                                            @else
                                            @endif
                                        </ul>

                                        <label class="date">  {{json_decode($preOrder->products, true)['date']}}</label>
                                        <form action="{{route('user.maim.delete', $preOrder->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @elseif($preOrder->role == 'hostel')
                                <div class="section-label">
                                    <h2 class="mt-5">
                                        Отель
                                    </h2>
                                    <hr>
                                </div>
                                <div class="rooms">
                                    <div class="rooms-item">
                                        <img src=" {{$preOrder->image_product}}">
                                        {{--                                {{json_decode($preOrder->products, true)['totalPrice']}}--}}
                                        <label class="name"> {{$preOrder->role}}<br>" {{$preOrder->name_product}}"</label>
                                            <div class="product_cat">
                                           <span>{{json_decode($preOrder->products, true)['category'] }}</span> <br>
                                           <span>({{json_decode($preOrder->products, true)['berth'] }} человек)</span>
                                            </div>
                                        <ul class="service">
                                                <li class="product_list">
                                                    @foreach(json_decode($preOrder->products, true)['date'] as $list)
                                                    <div class="product_item_header">{{$list}}</div>
{{--                                                    <div class="product_item_header">{{$list[1]}}</div>--}}
                                                    @endforeach
                                                    <span>{{json_decode($preOrder->products, true)['title'] }}</span>
                                                    <label class="cost">  {{json_decode($preOrder->products, true)['price']}}р</label>
                                                </li>

                                        </ul>
{{--                                        <label class="date">  {{json_decode($preOrder->products, true)['date']}}</label>--}}
                                        <form action="{{route('user.maim.delete', $preOrder->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            @elseif($preOrder->role == 'sanatorium')
                                <div class="section-label">
                                    <h2 class="mt-5">
                                        Cанаторий
                                    </h2>
                                    <hr>
                                </div>
                                <div class="rooms">
                                    <div class="rooms-item">
                                        <img src=" {{$preOrder->image_product}}">
                                        {{--                                {{json_decode($preOrder->products, true)['totalPrice']}}--}}
                                        <label class="name"> {{$preOrder->role}}<br>" {{$preOrder->name_product}}"</label>
                                        <div class="product_cat">
                                            <span>{{json_decode($preOrder->products, true)['category'] }}</span> <br>
                                            <span>({{json_decode($preOrder->products, true)['berth'] }} человек)</span>
                                        </div>
                                        @foreach(json_decode($preOrder->products, true)['date'] as $list)
                                        <div class="">{{$list}}</div>
                                        @endforeach
                                        <ul class="service">
                                            @if((json_decode($preOrder->products, true)['productList']) !== null)
                                                @foreach((json_decode($preOrder->products, true)['productList']) as $list)
                                                    <li class="product_list">
                                                        <div class="product_item_header">{{$list['product']}}</div>
                                                        <span>{{$list['qty']}}</span>
                                                        <label class="cost">  {{$list['price']}}р</label>
                                                    </li>
                                                @endforeach
                                            @else
                                            @endif
                                        </ul>
                                        <ul class="service">
                                            @if((json_decode($preOrder->products, true)['product']) !== null)
                                                @foreach((json_decode($preOrder->products, true)['product']) as $item)
                                                    <li class="product_list">
                                                        <div class="product_item_header">
                                                            <h5 class="text-bold">{{$item['cat']}}</h5>
                                                            <p>{{$item['product']}}</p>
                                                        </div>
                                                        <span>{{$item['qty']}}</span>
                                                        <label class="cost">  {{$item['price']}}р</label>
                                                    </li>
                                                @endforeach
                                            @else
                                            @endif
                                        </ul>
                                        <form action="{{route('user.maim.delete', $preOrder->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            @elseif($preOrder->role == 'tur')
                                <div class="section-label">
                                    <h2 class="mt-5">
                                        Туроператор
                                    </h2>
                                    <hr>
                                </div>
                                <div class="rooms">
                                    <div class="rooms-item">
                                        <img src=" {{$preOrder->image_product}}">
                                        {{--                                {{json_decode($preOrder->products, true)['totalPrice']}}--}}
                                        <label class="name">"{{$preOrder->name_product}}"</label>
                                        <div class="product_cat">
                                            <span>{{json_decode($preOrder->products, true)['title'] }}</span> <br>
                                            <span>({{json_decode($preOrder->products, true)['berth'] }} человек)</span>
                                        </div>
                                        <ul class="service">
                                            <li class="product_list">
                                                <span>{{json_decode($preOrder->products, true)['date'] }}</span>
                                                <label class="cost">  {{json_decode($preOrder->products, true)['price']}}р</label>
                                            </li>

                                        </ul>
                                        {{--                                        <label class="date">  {{json_decode($preOrder->products, true)['date']}}</label>--}}
                                        <form action="{{route('user.maim.delete', $preOrder->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent" l>
                                                <i class="fas fa-trash text-danger mr-5" role="button"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            @else
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col col-md-3">
                    <div class="all-cost">
                        <p>Итого:</p>
                        <label>6800р</label>
                        <input type="submit" value="Оплатить">
                    </div>
                </div>
            </div>
            <div class="promocodes box hide">
                <div class="cart-section">
                    <div class="section-label">
                        <h2>Отели</h2>
                        <hr>
                    </div>
                    <div class="rooms">

                        <div class="item">

                            <label class="name">Отель "Comfortee"<br>Стандарт (1 человек)</label>
                            <label class="promocode">500-20-303</label>
                            <label class="date">24.03.2023</label>
                        </div>
                        <div class="item promocode-used">

                            <label class="name">Отель "Звезда"<br>Люкс (1 человек)</label>
                            <label class="promocode">500-29-999</label>
                            <label class="date">14.01.2022</label>
                        </div>
                    </div>
                </div>
                <div class="cart-section">
                    <div class="section-label">
                        <h2>Медицинские центры</h2>
                        <hr>
                    </div>
                    <div class="rooms">

                        <div class="item">

                            <label class="name">Мед. центр "FamilyMed"<br>Консультация хирурга</label>
                            <label class="promocode">540-27-657</label>
                            <label class="date">04.03.2023</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
