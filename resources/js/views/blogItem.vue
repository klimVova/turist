<template>
  <div>
    <div class="container-fluid main">
      <div class="blog-page">
        <div class="blog-page-img">
          <img :src="post.image_url">
        </div>
        <div class="blog-page-text">
          <div class="section-label">
            <h2>{{post.title}}</h2>
            <hr>
          </div>
          <p>{{post.content}}</p>
          <input type="submit" name="" value="Следующая статья">
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
    }
  },
  methods: {
    getBlog() {
      this.axios.get('/api/posts/' + this.$route.params.id,)
          .then(res => {
            this.post = res.data.data
          })
    }
  },
  mounted() {
    this.getBlog()
   }
}
</script>

<style scoped>

</style>