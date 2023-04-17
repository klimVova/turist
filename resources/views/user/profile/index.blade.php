<div class="row profile box">

    <div><img class="edit" onclick="edit()" src="{{asset('assets/img/edit.svg')}}"></div>
    <form action="{{route('user.profile.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

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
    </form>
</div>
