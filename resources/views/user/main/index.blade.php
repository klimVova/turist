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
                    <li data-f="profile" class="active spisok">Личные денные</li>
                    <li data-f="cart"  class="spisok">Корзина</li>
                    <li data-f="promocodes" class="spisok">Промокоды</li>
                </ul>
            </nav>
            <div class="row profile box">
                <div><img class="edit" onclick="edit()" src="{{asset('assets/img/edit.svg')}}"></div>

                <div class="profile-data">
                    <div class="profile-data-item">
                        <label>Фамилия</label>
                        <input class="edit-dis" type="text" name="surname" value="Иванов">
                    </div>
                    <div class="profile-data-item">
                        <label>Имя</label>
                        <input class="edit-dis" type="text" name="name" value="Иван">
                    </div>
                    <div class="profile-data-item">
                        <label>email</label>
                        <input class="edit-dis" type="text" name="email" value="vanya@gmail">
                    </div>
                    <div class="profile-data-item">
                        <label>Пол</label>
                        <div class="radio">
                            <input class="edit-dis" type="radio" name="sex" value="men" checked=""> <p>Мужской</p>
                            <input class="edit-dis" type="radio" name="sex" value="women"> <p>Женский</p>
                        </div>
                    </div>
                    <div class="profile-data-item">
                        <label>Возраст</label>
                        <input class="edit-dis" type="text" name="age" value="26">
                    </div>
                    <div class="profile-data-item">
                        <label>Телефон</label>
                        <input class="edit-dis" type="text" name="tel" value="8 800 888 88 88">
                    </div>
                    <div class="profile-data-item">
                        <label>Страна</label>
                        <input class="edit-dis" type="text" name="country" value="Россия">
                    </div>
                    <div class="profile-data-item">
                        <label>Город</label>
                        <input class="edit-dis" type="text" name="city" value="Санкт-Петербург">
                    </div>
                </div>
                <div class="button">
                    <input
                        type="submit"
                        value="Сохранить изменения"
                    />
                </div>
            </div>

            <div class="cart row box hide">
                <div class="col col-12 col-md-9">
                    <div class="cart-section">
                        <div class="section-label">
                            <h2>Отели</h2>
                            <hr>
                        </div>
                        <div class="rooms">

                            <div class="rooms-item">
                                <img src="{{asset('assets/img/room.jpg')}}">

                                <label class="name">Отель<br>"Comfortee"</label>
                                <label class="service">Стандарт<br>(1 человек)</label>
                                <label class="date">24.03.2023-25.03.2023</label>
                                <label class="cost">1240р</label>
                                <img onclick="" class="delete" src="{{asset('assets/img/delete.svg')}}">
                            </div>
                            <div class="rooms-item">
                                <img src="{{asset('assets/img/card-cafe.jpg')}}">

                                <label class="name">Отель<br>"Comfortee"</label>
                                <label class="service">Стандарт<br>(1 человек)</label>
                                <label class="date">24.03.2023-25.03.2023</label>
                                <label class="cost">1240р</label>
                                <img onclick="" class="delete" src="{{asset('assets/img/delete.svg')}}">
                            </div>

                        </div>

                    </div>

                    <div class="cart-section">
                        <div class="section-label">
                            <h2>Медицинские центры</h2>
                            <hr>
                        </div>
                        <div class="rooms">

                            <div class="rooms-item">
                                <img src="{{asset('assets/img/med.jpg')}}">

                                <label class="name">Мед. центр<br>"FamilyMed"</label>
                                <label class="service">Консультация гастроэнтеролога</label>
                                <label class="date">24.03.2023<br>18:10</label>
                                <label class="cost">800р</label>
                                <img onclick="" class="delete" src="{{asset('assets/img/delete.svg')}}">
                            </div>

                        </div>

                    </div>

                    <div class="cart-section">
                        <div class="section-label">
                            <h2>Рестораны/Кафе</h2>
                            <hr>
                        </div>
                        <div class="rooms">

                            <div class="rooms-item">
                                <img src="{{asset('assets/img/room.jpg')}}">

                                <label class="name">Ресторан<br>"Устрица"</label>
                                <ul class="service">
                                    <li>Ролл "Калифорния" <span>(2шт)</span></li>
                                    <li>Омлет с мидиями <span>(2шт)</span></li>
                                    <li>Чай "Молочный улун" <span>(1шт)</span></li>

                                </ul>
                                <label class="date">24.03.2023</label>
                                <label class="cost">4650р</label>
                                <img onclick="" class="delete" src="{{asset('assets/img/delete.svg')}}">
                            </div>

                        </div>

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
