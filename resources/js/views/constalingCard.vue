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
                                    <img style="width: 300px;height: 300px;" :src="card.preview_image">
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
                                    <input @click.prevent="toggleModal" :class="state.user !== '' ? '' : 'disabled '"
                                           type="submit" value="Оставить заявку">
                                </div>
                            </div>
                            <div class="col col-12 col-md-12 hotels-inf-item">
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
                                    <h2>Услуги</h2>
                                    <hr>
                                </div>
                                <div class="service-list">
                                    <!-- <div class="service-item"> -->
                                    <div v-for="p in ps" class="category fadeInUp wow animated"
                                         style="visibility: visible; animation-name: fadeInUp;">
                                        <div v-if="p.user_id == card.user_id && p.cat_id == card.cat_id" class="subcategory">
                                            <div class="d-flex col justify-content-between">
                                                <div><label> {{p.title }} </label>
                                                </div>
                                                <div><label> {{p.price }} </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 hotels-inf-item">
                                <div class="section-label">
                                    <h2><span id="review"></span> Отзывы</h2>
                                    <hr>
                                </div>
                                <div class="reviews">
                                    <div v-for="comment in comments" class="reviews-item">
                                        <div v-if="comment.constalingCard_id === card.id">
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
        <modal-constaling
            :modal-active="modalActive"
            :card="card"
            @close="toggleModal"
        >
        </modal-constaling>
    </div>
</template>

<script>
import user from "../user";
import modalConstaling from "../components/modal/modalConstaling.vue";
import {ref} from "vue";

export default {
    components: {
        modalConstaling
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
            lists:[],
            services: [],
            message: [],
            comments: [],
            persons: [],
            user_name: [],
            pageOfItems: [],
            pagination: [],
            ps:[],
        }
    },
    methods: {
        getCard() {
            this.axios.get('/api/consultingCard/' + this.$route.params.id)
                .then(res => {
                    this.card = res.data.data;
                })
        },
        commentCafe() {
            this.axios.post(`/api/consulting/${this.card.id}/comments`, {
                'message': this.message,
                'constalingCard_id': this.card.id,
                'user_name': this.state.user,
            })
                .then(res => {
                    this.getComment()
                })
        },
        getComment(page = 1) {
            this.axios.post('/api/consultingShow/' + this.$route.params.id + '/comments', {
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
            this.axios.delete(`/api/consulting/comment/${id}`)
                .then(res => {
                    this.getComment()
                })
        },
        getLists() {
            this.axios.get('/api/consultingTodoList', {})
                .then(res => {
                    this.ps = res.data.data
                })
        },
    },
    mounted() {
        this.getCard()
        this.getComment()
        this.getUser()
        this.getLists()
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

.disabled {
    pointer-events: none !important;
    opacity: 0.3;
}
</style>
