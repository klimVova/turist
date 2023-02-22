<template>
  <div class="container-fluid main card">
    <div class="row menu-categories">
      <div class="sort col col-12 col-md-2">
        <div id="menu_categories" class="menu-categories-items">
          <ul>
            <a v-for="category in categories" :href="`#${category.title}`">
              <div >
                <li v-if="category.user_id === card.user_id">{{ category.title }}</li>
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
                <h2>{{ card.title }}</h2>
                <span><a href="#review">({{pagination.total}} отзывов)</a></span>
                <p>{{ card.content }}</p>
                <div class="hotel-gallery">
                  <ul>
                    <li v-for="image in card.images" id="1"><img :src="image.images"></li>
                  </ul>
                </div>
              </div>

            </div>
            <div class="card-contacts col col-12 col-md-3">
              <div class="address">
                <label>Адрес</label>
                <p>{{ card.address }}</p>
              </div>
              <div class="number">
                <img src="assets/img/tel.svg">
                <p>{{ card.phone }}</p>
              </div>
            </div>
            <div class="col col-12 col-md-12 hotels-inf-item">
              <div class="section-label">
                <h2>Преференции для клиентов платформы</h2>
                <hr>
              </div>
              <div class="prefer-list">
                <ul>
                  <li  v-for="action in actions"><img src="assets/img/check-list.svg">
                    <template v-if="action.user_id === card.user_id"> {{action.title}}</template>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col col-12 col-md-12 hotels-inf-item">
              <div class="section-label">
                <h2>Услуги и удобства</h2>
                <hr>
              </div>
              <div class="prefer-list">
                <ul>
                  <li v-for="servic in servics">
                    <template v-if="servic.user_id === card.user_id">
                      <img src="assets/img/check-list.svg">{{ servic.title }}
                    </template>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col col-12 col-md-12 hotels-inf-item">
              <div class="section-label">
                <h2>Номера</h2>
                <hr>
              </div>
              <div class="rooms">
                <div v-for="post in posts" class="rooms-item">
<!--                  <template v-for="image in post.image_post">-->
                  <img :src="post.hostel_preview_image">
<!--                  </template>-->
                  <label :id="`${post.category}`">{{post.category}}<br>{{post.berth}}</label>
                  <ul>
                    <li v-for="tag in post.tags"><img src="assets/img/check-list.svg">{{tag.title}}</li>
                  </ul>
                  <label class="cost">{{post.price}}р за сутки</label>
                  <input type="submit" value="Забронировать">
                </div>
              </div>
            </div>
            <div class="col col-12 col-md-6 hotels-inf-item">
              <div class="section-label">
                <h2><span id="review"></span> Отзывы</h2>
                <hr>
              </div>
              <div class="reviews">
                <div v-for="comment in comments" class="reviews-item">
                  <div v-if="comment.hostelCard_id === card.id">
                    <div v-for="user in persons">
                      <div v-if="user.id === Number(comment.user_name)">
                        <label>{{ user.name }}</label>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-sm-between">
                      <p>{{ comment.message }}</p>
                      <div :class="state.user !== '' ? '' : 'hide'">
                        <a @click.prevent="deleteComment(comment.id)"
                           :class="(Number(state.user) === card.user_id ||
                              state.user === comment.user_name) ?
                               'btn btn-danger btn-delete-active' :
                               'btn btn-danger btn-delete disabled' ">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
                <nav aria-label="..." :class="comments.length === 0 ? 'hide' : ''">
                  <ul class="pagination pagination-lg">
                    <li v-for="link in pagination.links" class="page-item">
                      <template v-if="Number(link.label)" >
                        <a @click.prevent="getComment(link.label)"  :class="link.active ? 'active page-link' : 'page-link'">{{link.label}}</a>
                      </template>

                    </li>
                  </ul>
                </nav>
                <div :class="state.user !== '' ? '' : 'hide'">
                  <span>Введите ваш отзыв:</span>
                  <p><textarea v-model="message" class="comment-input" name="text"></textarea></p>
                  <p><input  class="comment-button" @click.prevent="commentHostel" type="submit" value="Отправить"></p>
                </div>
              </div>
            </div>

            <div class="col col-12 col-md-6 hotels-inf-item">
              <div id="map-test" class="map zoomIn wow " data-wow-offset='0'
                   data-wow-delay='0.2s'
                   data-wow-duration='1s'></div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import user from "../user";

export default {
  name: "hostelCard",
  setup() {
    const {state} = user;
    return {state};
  },
  data() {
    return {
      id: this.$route.params.id,
      card: [],
      actions:[],
      servics:[],
      posts:[],
      message: [],
      comments: [],
      persons: [],
      user_name: [],
      pageOfItems: [],
      pagination:[],
      categories:[],
    }
  },
  methods:{
    getCard() {
      this.axios.get('/api/hostel/' + this.$route.params.id)
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
    getAction() {
      this.axios.get('/api/hostelAction')
          .then(res => {
            this.actions = res.data.data;
          })
    },
    getServic(){
      this.axios.get('/api/hostelServic')
          .then(res => {
            this.servics = res.data.data;
          })
      },
    getPost(){
      this.axios.get('/api/hostelPost')
          .then(res => {
            this.posts = res.data.data;
          })
    },
    getCatagoties(){
      this.axios.get('/api/hostelCategories')
          .then(res => {
            this.categories = res.data.data;
          })
    },
    commentHostel() {
      this.axios.post(`/api/hostel/${this.card.id}/comments`, {
        'message': this.message,
        'hostelCard_id': this.card.id,
        'user_name': this.state.user,
      })
          .then(res => {
            console.log(res);
            this.getComment()
          })
    },
    getComment(page=1) {
      this.axios.post('/api/hostelShow/' + this.$route.params.id + '/comments' , {
        'page' : page
      })
          .then(res => {
            console.log(res);
            this.comments = res.data.data
            this.message = ''
            this.pagination = res.data.meta
          })
    },
    getUser() {
      this.axios.get('/api/users')
          .then(res => {
            this.persons = res.data.data
            this.pers = JSON.parse(JSON.stringify(this.persons))
          })
    },
    deleteComment(id){
      this.axios.delete(`/api/hostel/comment/${id}`)
          .then(res=>{
            this.getComment()
          })
    },
  },
  mounted() {
    this.getCard()
    this.getAction()
    this.getServic()
    this.getPost()
    this.getComment()
    this.getUser()
    this.getCatagoties()
  }
}
</script>

<style scoped>
.btn-delete{
  opacity: 0.1;
}
.btn-delete-active{
  opacity: 1;
}
.hide{
  display: none;
}
.comment-input{
  width: 100%;
  max-width: 485px;
  height: 80px;
  border: 1px solid #51D3B7;
  border-radius: 3px;
}
.comment-button {
  width: 200px;
  background-color: #51D3B7;
  color: white;
  padding: 14px 24px;
  margin-top: 12px;
  border: none;
  -webkit-box-shadow: 0 1px 5px rgb(81 211 183 / 25%);
  box-shadow: 0 1px 5px rgb(81 211 183 / 25%);
}
.active{
  border:1px solid  #51D3B7 !important;

}
</style>