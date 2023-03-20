<template>
    <div>
        <div class="container-fluid container-blog main">
            <div class="blog">
                <div class="section-label">
                    <h2>Блог</h2>
                    <hr>
                </div>
                <div class="row blog-items " id="container">
                    <div v-for="post in posts"  class="col col-12 col-md-6 blog-item">
                        <router-link :to="'/blog/'+ post.id">
                            <div class="blog-img">
                                <img :src="post.image_url" class="zoomIn wow " data-wow-offset='0'
                                     data-wow-delay='0.2s'
                                     data-wow-duration='1s'>
                            </div>
                            <div class="blog-descr">
                                <label>{{ post.title }}</label>
                                <p v-html="post.desc"></p>
                                <span>{{localeDate}}</span>
                            </div>
                        </router-link>
                    </div>
                </div>
                <input  type="button"  id="load-more-btn" value="Читать дальше">
            </div>
        </div>
    </div>
</template>

<script>
import BlogItem from "../views/blogItem.vue";
export default {
    name: "blog",
    components: {BlogItem},
    data() {
        return {
            posts: [],
        }
    },
    methods: {
        getBlog() {
            this.axios.get('/api/posts')
                .then(res => {
                    this.posts = res.data.data
                })
                .catch(error => console.log(error))
        },
        load(){
            let loadMoreBtn = document.querySelector('#load-more-btn');
            let currentItem = 2;
            loadMoreBtn.onclick = () => {
                let boxes = [...document.querySelectorAll('.blog-items .blog-item')];
                for (var i = currentItem; i < currentItem + 2; i++) {
                    boxes[i].style.display = "inline-block";
                }
                currentItem += 2;
                if (currentItem >= boxes.length) {
                    loadMoreBtn.style.display = "none"
                }
            }
        }
    },
    mounted() {
        this.load()
        this.getBlog()
    },
    computed: {
        localeDate() {
            return (new Date(this.posts.created_at)).toLocaleDateString()
        },
    },
    created() {
        this.intervalId = setInterval(() => this.posts.created_at = Date.now(), 1000);

    },
    beforeDestroy() {
        if (this.intervalId) clearInterval(this.intervalId)
    },
}
</script>

<style scoped>
.blog-item {
    display: none;
}
.blog-item:nth-child(1),
.blog-item:nth-child(2){
    display: inline-block;
    transition: 0.2s ease;
}
.blog-item img:hover {
    transform: scale(1.02);
    border-radius: 10px;
    transition: 0.5s ease;
}
</style>
