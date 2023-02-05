<template>
  <div>
    <div class="container-fluid main card">
      <div class="row menu-categories">
        <div class="sort col col-12 col-md-2">
          <div id="menu_categories" class="menu-categories-items">
            <ul>
              <a v-for="list in lists" :href="`#${list.title}`">
                <div>
                  <li v-if="list.user_id === card.user_id">{{ list.title }}</li>
                </div>
              </a>
            </ul>
          </div>
        </div>

        <div class="card-cafe col col-12 col-md-10">
          <div class="container-fluid">
            <div class="row">
              <div class="card-main-info col col-12 col-md-9">
                <div class="card-item-img">
                  <img :src="card.image_url">
                </div>
                <div class="card-item-descr">
                  <h2>{{ card.title }} </h2>
                  <span><a href="#review">(11 отзывов)</a></span>
                  <p>{{ card.content }}</p>
                  <input type="submit" value="Заказать услугу">
                  <p></p>
                </div>
              </div>
              <div class="card-contacts col col-12 col-md-3">
                <div class="work-hours">
                  <label>Время работы</label>
                  <div v-for="time in times">
                    <div v-if="time.user_id === card.user_id">
                      <p>{{ time.time_date }}</p>
                      <span>{{ time.time_start }}-{{ time.time_end }}</span>
                    </div>
                  </div>
                </div>
                <div class="address">
                  <label>Адрес</label>
                  <p>{{ card.address }}</p>
                </div>
                <div class="number">
                  <img src="assets/img/tel.svg">
                  <p>{{ card.phone }}</p>
                </div>
              </div>
              <div class="col col-12 col-md-6 mb-3">
                <div class="section-label">
                  <h2>Меню</h2>
                  <hr>
                </div>
                <div class="service-list">
                  <!-- <div class="service-item"> -->
                  <div v-for="list in lists" class="category fadeInUp wow animated"
                       style="visibility: visible; animation-name: fadeInUp;">
                    <label v-if="list.user_id === card.user_id"><span :id="`#${list.title}`"></span>{{
                        list.title
                      }}</label>
                    <div v-for="subcat in items" class="subcategory">
                      <div class="d-flex col justify-content-between">
                        <div><label
                            v-if="subcat.medical_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">{{ subcat.title }} </label>
                        </div>
                        <div><label
                            v-if="subcat.medical_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">{{ subcat.price }} </label>
                        </div>
                      </div>

                      <div v-for="product in products" class="service">
                        <div class="d-flex col justify-content-between"
                             v-if="product.medical_todo_item_id === subcat.id && subcat.medical_todo_list_id === list.id && list.user_id === card.user_id && product.deleted_at === null ">
                          <p>{{ product.title }}</p>
                          <p>{{ product.price }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- </div> -->
                </div>
              </div>
              <div class="col col-12 col-md-6">
                <div id="map-test" class="map zoomIn wow  animated" data-wow-offset="0" data-wow-delay="0.2s"
                     data-wow-duration="1s"
                     style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: zoomIn;">
                </div>
                <div class="section-label">
                  <h2><span id="review"></span> Отзывы</h2>
                  <hr>
                </div>
                <div class="reviews">
                  <div class="reviews-item">
                    <label>Лариса</label>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex</p>
                  </div>
                  <div class="reviews-item">
                    <label>Лариса</label>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex</p>
                  </div>
                  <div class="reviews-item">
                    <label>Лариса</label>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation ullamco laboris nisi ut aliquip ex</p>
                  </div>

                  <!-- pagination -->

                  <form action="" method="">
                    <span>Введите ваш отзыв:</span>
                    <p><textarea rows="3" name="text"></textarea></p>
                    <p><input type="submit" value="Отправить"></p>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "medicalCard",
  data() {
    return {
      id: this.$route.params.id,
      card: [],
      times: [],
      lists: [],
      items: [],
      products: [],
      message: [],
      comments: [],
      users: [],
      user_name: [],
    }
  },
  methods: {
    getTime() {
      this.axios.get('/api/time')
          .then(res => {
            this.times = res.data.data;
          })
    },
    getList() {
      this.axios.get('/api/list')
          .then(res => {
            this.lists = res.data.data;
            this.cats = res.data.data;
          })
    },
    getItem() {
      this.axios.get('/api/item')
          .then(res => {
            this.items = res.data.data;
          })
    },
    getProduct() {
      this.axios.get('/api/product')
          .then(res => {
            this.products = res.data.data;
          })
    },
    getCard() {
      this.axios.get('/api/medicals/' + this.$route.params.id)
          .then(res => {
            this.card = res.data.data;
            let center = [this.card.coordinate_l, this.card.coordinate_r];

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
          })
    },
    commentMed() {
      this.axios.post(`/api/medicals/${this.card.id}/comments`, {
        message: this.message,
        medicalCard_id: this.card.id,
        user_name: this.user
      })
          .then(res => {
            this.getComment()
          })
    },
    getComment() {
      this.axios.get('/api/comments')
          .then(res => {
            this.comments = res.data.data
            this.message = '';
          })
    },
    getUsers() {

    },
  },
  mounted() {
    this.getList()
    this.getCard()
    this.getTime()
    this.getItem()
    this.getProduct()
    this.getComment()
    this.getUsers()
  }
}
</script>

<style scoped>

</style>