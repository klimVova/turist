<template>
  <div>
    <div class="container-fluid container-blog main">
      <div class="blog">
        <div class="section-label">
          <h2>Блог</h2>
          <hr>
        </div>
        <div class="row blog-items">

          <div v-for="post in posts"  class="col col-12 col-md-6 blog-item">
            <router-link :to="'/blog/'+ post.id">
            <div class="blog-img">
              <img :src="post.image_url" class="zoomIn wow " data-wow-offset='0'
                   data-wow-delay='0.2s'
                   data-wow-duration='1s'>
            </div>
            <div class="blog-descr"><label>{{ post.title }}</label>
              <p>{{ post.content }}</p>
              <span>{{localeDate}}</span>
            </div>
            </router-link>
          </div>
        </div>
        <input type="button" value="Читать дальше">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "blog",
  data() {
    return {
      posts: [],
    }
  },
  methods: {
    getBlog() {
      this.axios.get('http://127.0.0.1:8000/api/posts',)
          .then(res => {
            this.posts = res.data.data
            console.log();
          })
    }
  },
  mounted() {
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

</style>