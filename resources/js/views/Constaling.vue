<template>
    <div class="container-fluid main catalog ">
        <div class="section-label">
            <h2>Каталог</h2>
            <hr>
        </div>

        <div class="consult-img">
            <img src="assets/img/cons.svg">
            <p>Мы не просто увеличиваем поток ваших клиентов,<br>
                мы профессионально развиваем ваш бизнес</p>
        </div>
        <div class="row sort ">
            <div class="col col-md-10 ">
                <div class="org-type-sort d-flex parent">
                    <div v-for="i in categories"
                         :key="i"
                         class=""
                         :class="activeEl !== i && activeEl !== false ? '' : 'active'"
                         @click="activeEl = i"
                    >
                        <p>{{ i.title }}</p>
                        <div class="consulting_card card-body">
                            <div  class="" v-for="card in cards">
                                <router-link :to="'/consultings/'+ card.id">
                                    <div :class="activeEl !== i && activeEl !== false ? 'd-none' : ''">
                                        <div class="consulting_flex mb-5" v-if="card.cat_id == i.id">
                                            <div class="item-img">
                                                <img style="width: 300px;height: 200px;" :src="card.preview_image">
                                            </div>
                                            <div class="list-item-descr">
                                                <h2>{{ card.title }}</h2>
                                                <div v-for="list in lists">
                                                    <div v-if="list.cat_id == i.id && card.user_id == list.user_id">
                                                        <img src="assets/img/check-list.svg">
                                                        {{ list.title }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
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
    name: "Constaling",
    data() {
        return {
            categories: null,
            cards: null,
            lists: null,
            activeEl: true,
            act: true,
        }
    },
    methods: {
        getCategory() {
            this.axios.get('/api/consultingCat', {})
                .then(res => {
                    this.categories = res.data.data
                })
        },
        getCards() {
            this.axios.get('/api/consultingCards', {})
                .then(res => {
                    this.cards = res.data.data
                })
        },
        getLists() {
            this.axios.get('/api/consultingTodoList', {})
                .then(res => {
                    this.lists = res.data.data
                    console.log(this.lists);
                })
        },
    },
    mounted() {
        this.getCategory()
        this.getCards()
        this.getLists()
    }
}
</script>

<style scoped>
.consult-img {
    padding-top: 20px;
    display: flex;
    align-items: center;
}

.consult-img p {
    font-size: 24px;
    font-weight: 700;
    color: #505050;
}


.org-type-sort p {
    padding: 12px 24px;
    border-bottom: 1px solid #08366A;
    border-radius: 0;
    list-style-type: none;
}

.consulting_card {
    position: absolute;
    left: 0;
    height: auto;
}

.active {
    height: 48px;
    background-color: #08366A;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

.active p {
    border-bottom: 1px solid #08366A;
    border-radius: 0;
    list-style-type: none;
    color: #fff;
}

.parent {
    position: relative;
    height: 100vh;
}
.consulting_flex{
    display: flex;
}
@media (max-width: 480px) {
    .consulting_flex {
       display: block;
    }
}
</style>
