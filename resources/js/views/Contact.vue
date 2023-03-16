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
          <p>109387, Москва г, вн.тер.г. Люблино, пр-кт 40 лет Октября, д. 4, к. 2, пом. 109</p>
        </div>
        <div class="contacts-item">
          <label>ИНН</label>
          <p>7717762693</p>
        </div>
        <div class="contacts-item">
          <label>Телефон</label>
          <p>+7-915-458-90-28</p>
        </div>
        <div class="contacts-item">
          <label>E-mail</label>
          <p>unity.unity@mail.ru</p>
        </div>
      </div>
      <div class="col col-12 col-md-6 contacts-map" style="padding: 0 0 4px 0">
        <div id="map-test" class="map zoomIn wow "  data-wow-offset='0'
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

</style>
