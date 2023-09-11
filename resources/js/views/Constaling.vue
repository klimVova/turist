<template>
    <div class="container-fluid main catalog сons-container">
        <div class="section-label">
            <h2>Консалтинг</h2>
            <hr>
        </div>

        <div class="consult-img">
            <img src="assets/img/cons.svg">
            <p>Мы не просто увеличиваем поток ваших клиентов,<br>
                мы профессионально развиваем ваш бизнес</p>
        </div>
        <div class="row sort ">
            <div class="col col-md-10 ">
                <div class="org-type-sort line d-flex">
                    <div  v-for="i in categories"
                         :key="i"
                         class=""
                         :class="activeEl !== i && activeEl !== false ? '' : 'active'"
                         @click="activeEl = i"
                    >
                        <p>{{ i.title }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row sort1 ">
            <div class="col col-md-10 ">
                <div class="org-type-sort d-flex">
                    <div v-for="i in categories"
                         :key="i"
                         class=""
                         @click="activeEl = i"
                    >
                        <div
                            v-if="visible"
                            :class="activeEl !== i && activeEl !== false ? 'd-none' : 'consulting_desc'">
                            <div class="" >
                                {{ i.content }}
                            </div>
                        </div>
                        <div
                            :class="activeEl !== i && activeEl !== false ? 'd-none' : 'consulting_card card-body parent'"
                        >
                            <button class="btn" @click.prevent="visible=!visible">{{visible?'Закрыть':'Подробнее'}}</button>
                            <div  class="" v-for="card in cards">
                                <router-link :to="'/consult/'+ card.id">
                                    <div :class="activeEl !== i && activeEl !== false ? 'd-none' : ''">
                                        <div class="consulting_flex mb-5" v-if="card.cat_id == i.id">
                                            <div class="item-img">
                                                <img style="width: 300px;height: 200px;" :src="card.preview_image">
                                            </div>
                                            <div class="list-item-descr">
                                                <h2>{{ card.title }}</h2>
                                                <div v-for="action in actions">
                                                    <div v-if="action.cat_id == i.id && card.user_id == action.user_id">
                                                        <img src="assets/img/check-list.svg">
                                                        {{ action.title }}
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
            array:null,
            visible: true,
            actions:null,
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
                })
        },
        getActions() {
            this.axios.get('/api/consultingAction', {})
                .then(res => {
                    this.actions = res.data.data
                    console.log(this.actions);
                })
        },
    },
    mounted() {
        this.getCategory()
        this.getCards()
        this.getLists()
        this.getActions()
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
    border-radius: 0;
    list-style-type: none;
}
.line::before{
    content: " ";
    position: absolute;
    top: 92px;
    left: 1px;
    padding: 1px;
    width:100%;
    height: 1px;
    background-color: #08366A;
    transition: left 0.3s ease-in;
}

.consulting_card {
    position: absolute;
    left: 0;
    height: auto;
    margin-top: 25px;
}

.active {
    height: 10vh;
    background-color: #08366A;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

.active p {
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
.details{
    background: linear-gradient(rgba(225, 225, 255, 0), rgba(81, 211, 183, .4));
    margin-bottom: 10px;
    width: 100%;
    max-width: 800px;
}
.card-body{
    padding: 10px 10px 10px 0px !important;
}
.btn{
    text-transform: capitalize;
    width: 150px;
    margin: 0 0 10px 0;
    font-size: 12px;
    background-color: #51D3B7;
    color: white;
    padding: 10px 12px;
    border: none;
    -webkit-box-shadow: 0 1px 5px rgba(81, 211, 183, 0.25);
    box-shadow: 0 1px 5px rgba(81, 211, 183, 0.25);
}
.sort1 {
    margin-top: 10px;
    padding-left: 8px;
}
.sort{
    margin-top: 32px;
    padding-left: 8px;
    overflow-x: scroll;
}
@media (max-width: 480px) {
    .consulting_flex {
       display: block;
    }
    .btn{
        text-transform: capitalize;
        width: 100%;
        margin: 0 0 10px 0;
        font-size: 16px;
        background-color: #51D3B7;
        color: white;
        padding: 14px 24px;
        border: none;
        -webkit-box-shadow: 0 1px 5px rgba(81, 211, 183, 0.25);
        box-shadow: 0 1px 5px rgba(81, 211, 183, 0.25);
    }
    .consult-img{
        display: block;
    }
    .consult-img img{
        padding-left: 10%;
        width: 90%;
    }
    .consult-img p{
        font-size: 24px;
        font-weight: 700;
    }
    .cons-container .section-label {
        margin-top: 20px;
    }
    .consulting-flex .item-img img{
        width: 100%;
        padding-left: 0;
    }
    .list-item-descr img{
        width: 22px;
    }
    .line::before{
        content: " ";
        position: absolute;
        top: 105px;
        left: 1px;
        padding: 1px;
        width:100%;
        height: 1px;
        background-color: #08366A;
        transition: left 0.3s ease-in;
    }

}
</style>
