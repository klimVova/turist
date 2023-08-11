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
                                    <h2>{{ card.title }}</h2>
                                    <template v-if="pagination.total === 1">
                                        <span><a href="#review">({{ pagination.total }}  отзыв)</a></span>
                                    </template>
                                    <template v-else-if="pagination.total >= 2 && pagination.total <= 4">
                                        <span><a href="#review">({{ pagination.total }}  отзыва)</a></span>
                                    </template>
                                    <template v-else-if="pagination.total >= 5">
                                        <span><a href="#review">({{ pagination.total }}  отзывов)</a></span>
                                    </template>
                                    <p>{{ card.content }}</p>
                                    <div class="hotel-gallery">
                                        <ul>
                                            <li v-for="image in images" id="1">
                                                <template v-if="image.cafe_card_id === card.id">
                                                    <img :src="image.images">
                                                </template>
                                            </li>
                                        </ul>
                                    </div>
                                    <input @click.prevent="toggleModal" :class="state.user !== '' ? '' : 'disabled '" type="submit" value="Забронировать стол">

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
                            <div class="col col-12 col-md-12 hotels-inf-item">
                                <div class="section-label">
                                    <h2>Преференции для клиентов платформы</h2>
                                    <hr>
                                </div>
                                <div class="prefer-list">
                                    <ul>
                                        <template v-for="action in actions">
                                            <li v-if="action.user_id === card.user_id"><img
                                                src="assets/img/check-list.svg">
                                                {{ action.title }}
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 hotels-inf-item">
                                <div class="section-label">
                                    <h2>Меню</h2>
                                    <hr>
                                </div>
                                <div class="service-list">
                                    <!-- <div class="service-item"> -->
                                    <div v-for="list in lists" class="category fadeInUp wow animated"
                                         style="visibility: visible; animation-name: fadeInUp;">
                                        <label v-if="list.user_id === card.user_id"><span :id="`${list.title}`"></span>{{
                                                list.title
                                            }}</label>
                                        <div v-for="subcat in items" class="subcategory">
                                            <div class="d-flex col justify-content-between">
                                                <div><label
                                                    v-if="subcat.cafe_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">{{
                                                        subcat.title
                                                    }}</label>
                                                </div>
                                                <div><label
                                                    v-if="subcat.cafe_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">{{
                                                        subcat.price
                                                    }}</label>
                                                </div>
                                            </div>

                                            <div v-for="product in products" class="service">
                                                <div class="d-flex col justify-content-between"
                                                     v-if="product.cafe_todo_item_id === subcat.id && subcat.cafe_todo_list_id === list.id && list.user_id === card.user_id && product.deleted_at === null ">
                                                    <p>{{ product.title }}</p>
                                                    <p>{{ product.price }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 hotels-inf-item">
                                <!--<div id="map-test" class="map zoomIn wow  animated" data-wow-offset="0"
                                     data-wow-delay="0.2s"
                                     data-wow-duration="1s"
                                     style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: zoomIn;">
                                </div>-->
                                <div class="section-label">
                                    <h2><span id="review"></span> Отзывы</h2>
                                    <hr>
                                </div>
                                <div class="reviews">
                                    <div v-for="comment in comments" class="reviews-item">
                                        <div v-if="comment.cafeCard_id === card.id">
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
                                        <ul class="pagination pagination-lg ">
                                            <li v-for="link in pagination.links" class="page-item">
                                                <template v-if="Number(link.label)">
                                                    <a @click.prevent="getComment(link.label)"
                                                       :class="link.active ? 'active page-link' : 'page-link'">{{
                                                            link.label
                                                        }}</a>
                                                </template>

                                            </li>
                                        </ul>
                                    </nav>
                                    <div :class="state.user !== '' ? '' : 'hide'">
                                        <span>Введите ваш отзыв:</span>
                                        <p><textarea v-model="message" class="comment-input" name="text"></textarea></p>
                                        <p><input class="comment-button" @click.prevent="commentCafe" type="submit"
                                                  value="Отправить"></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <modal-cafe
            :modal-active="modalActive"
            :lists="lists"
            :items="items"
            :products="products"
            :card="card"
            @close="toggleModal"
        >
        </modal-cafe>
    </div>
</template>

<script>
import user from "../user";
import modalCafe from "../components/modal/modalCafe.vue";
import {ref} from "vue";

export default {
    components: {
        modalCafe
    },
    setup() {
        const {state} = user;
        const modalActive = ref(false);
        const toggleModal = () => {
            modalActive.value = !modalActive.value;
        }
        return {state, modalActive, toggleModal};

    },
    name: "spaCard",
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
            persons: [],
            user_name: [],
            pageOfItems: [],
            pagination: [],
            actions: [],
            images:[],
        }
    },
    methods: {
        getTime() {
            this.axios.get('/api/cafetimes')
                .then(res => {
                    this.times = res.data.data;
                })

        },
        getList() {
            this.axios.get('/api/cafelists')
                .then(res => {
                    this.lists = res.data.data;
                })
        },
        getItem() {
            this.axios.get('/api/cafeitems')
                .then(res => {
                    this.items = res.data.data;

                })

        },
        getProduct() {
            this.axios.get('/api/cafeproducts')
                .then(res => {
                    this.products = res.data.data;
                })
        },
        getCard() {
            this.axios.get('/api/cafe/' + this.$route.params.id)
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
        commentCafe() {
            this.axios.post(`/api/cafe/${this.card.id}/comments`, {
                'message': this.message,
                'cafeCard_id': this.card.id,
                'user_name': this.state.user,
            })
                .then(res => {
                    this.getComment()
                })
        },
        getComment(page = 1) {
            this.axios.post('/api/cafe/show/' + this.$route.params.id + '/comments', {
                'page': page
            })
                .then(res => {
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
        deleteComment(id) {
            this.axios.delete(`/api/cafe/comment/${id}`)
                .then(res => {
                    this.getComment()
                })
        },
        getAction() {
            this.axios.get('/api/cafeAction')
                .then(res => {
                    this.actions = res.data.data;
                })
        },
        getImage() {
            this.axios.get('/api/cafeImage')
                .then(res => {
                    this.images = res.data.data;
                })
        },
    },
    mounted() {
        this.getList()
        this.getCard()
        this.getTime()
        this.getItem()
        this.getProduct()
        this.getComment()
        this.getUser()
        this.getAction()
        this.getImage()
    }
}
</script>

<style scoped>
.btn-delete {
    opacity: 0.1;
}

.btn-delete-active {
    opacity: 1;
}

.hide {
    display: none;
}

.comment-input {
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

.active {
    border: 1px solid #51D3B7 !important;

}
.disabled{
    pointer-events: none !important;
    opacity: 0.3;
}
</style>
