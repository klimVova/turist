<template>
    <div>
        <div class="blog-page-img">
            <img src="assets/img/all-blog.jpg">
        </div>
        <div class="container-fluid main blog-info">
            <div class="blog-page">

                <div class="blog-page-text">
                    <div class="section-label">
                        <h2>{{post.title}}</h2>
                        <hr>
                    </div>
                    <p >
                        <img :src="post.image_url" class="image_post">
                        <p v-html="post.content"></p>
                    </p>
                    <input
                        :class=" item === Number(post.id + 1) ? 'hide mr-3' : 'mr-3'"
                        @click.prevent="getNext(Number(post.id + 1))" type="submit" name="" value="Следующая статья">
                    <input
                        @click.prevent="getHome()" type="submit" name="" value="Перейти на главную">
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "blogItem",
    data() {
        return {
            id: this.$route.params.id,
            post:[],
            count: [],
            item:0
        }
    },
    methods: {
        getBlog() {
            this.axios.get('/api/posts/' + this.$route.params.id,)
                .then(res => {
                    this.post = res.data.data
                })
        },
        getNext(id){
            this.axios.get('/api/posts/' + id)
                .then(res => {
                    this.axios.get('/api/posts')
                        .then(resp => {
                            this.count = resp.data.data
                            this.item = this.count.length
                        })
                    this.post = res.data.data
                })
        },
        getHome(){
            this.$router.push({name:'home'})
        }
    },
    mounted() {
        this.getBlog()
    }
}
</script>

<style scoped>
.hide{
    display: none;
}
.image_post{
    float:left;
    margin: 7px 25px 9px 0;
    width: 380px;
    height: auto;
}
</style>
