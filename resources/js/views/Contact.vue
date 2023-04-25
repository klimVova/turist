<template>
    <div class="container-fluid main contacts-main">
        <div class="section-label">
            <h2>Контакты</h2>
            <hr>
        </div>
        <div class="row contacts-content">
            <div class="col col-12 col-md-6 contacts">
                <div class="contacts-item">
                    <label>Наименование</label>
                    <p>ООО "ЦЕНТР ЮНИТИ"</p>
                </div>
                <div class="contacts-item">
                    <label>Адрес</label>
                    <p>109387, Москва г, вн.тер.г. Люблино, пр-кт 40 лет Октября, д. 4, к. 2, кв. 109</p>
                </div>
                <div class="contacts-item">
                    <label>Телефон</label>
                    <p>+7-915-458-90-28</p>
                </div>
                <div class="contacts-item">
                    <label>E-mail</label>
                    <p>unity.unity@mail.ru</p>
                    <router-link
                        class="policy"
                        :to="{name:'police'}">
                        Политика обработки персональных данных
                    </router-link>
<!--                    <a class="policy" href="policy.html">Политика обработки персональных данных</a>-->
                </div>
            </div>
            <div class="col col-12 col-md-6 contacts">
                <div class="contacts-item">
                    <label>ИНН</label>
                    <p>7717762693</p>
                </div>
                <div class="contacts-item">
                    <label>ОГРН</label>
                    <p>1137746849987</p>
                </div>
                <div class="contacts-item">
                    <label>Банковские реквизиты</label>
                    <p>КРАСНОДАРСКОЕ ОТДЕЛЕНИЕ №8619 ПАО СБЕРБАНК<br>БИК 040349602</p>
                </div>
                <div class="contacts-item">
                    <label>Расчетный счет</label>
                    <p>40702810930000002398</p>
                </div>
            </div>
            <div class="col col-12 col-md-12 contacts-map" style="margin-top: 30px;">
                <div id="map-test" class="map zoomIn wow " data-wow-offset='0'
                     data-wow-delay='0.2s'
                     data-wow-duration='1s'></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Contact",
    mounted() {
        let center = [55.68280750427821, 37.743030999999995];

        function init() {
            let map = new ymaps.Map('map-test', {
                center: center,
                zoom: 17
            });
            let placemark = new ymaps.Placemark(center, {}, {
                iconLayout: 'default#image',
                iconImageHref: 'assets/img/location.png',
                iconImageSize: [40, 40],
                iconImageOffset: [-19, -44]
            });
            map.controls.remove('geolocationControl'); // удаляем геолокацию
            map.controls.remove('searchControl'); // удаляем поиск
            map.controls.remove('trafficControl'); // удаляем контроль трафика
            map.controls.remove('typeSelector'); // удаляем тип
            map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
            map.controls.remove('zoomControl'); // удаляем контрол зуммирования
            map.controls.remove('rulerControl'); // удаляем контрол правил
            // map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
            map.geoObjects.add(placemark);
        }

        ymaps.ready(init);
    }
}
</script>

<style scoped>
.policy{
    color: #08366A!important;
    font-weight: bold;
    text-decoration: underline;
}
</style>
