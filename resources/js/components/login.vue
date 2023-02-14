<template >
  <div v-if="state.user === ''">
      <a href="http://127.0.0.1:8000/login"><img src="assets/img/office.svg"></a>
  </div>
  <div v-else>
  <div v-for="user in persons">
    <template v-if="Number(state.user) === user.id && user.role === 0  && state.user !== ''">
      <a href="http://127.0.0.1:8000/main/admin"><img src="assets/img/office.svg"></a>
    </template>
    <template v-else-if="Number(state.user) === user.id && user.role === 1  && state.user !== ''">
      <a href="http://127.0.0.1:8000/main/user"><img src="assets/img/office.svg"></a>
    </template>
    <template v-else-if="Number(state.user) === user.id && user.role === 4  && state.user !== ''">
      <a href="http://127.0.0.1:8000/main/medical"><img src="assets/img/office.svg"></a>
    </template>
    <template v-else-if="Number(state.user) === user.id && user.role === 5  && state.user !== ''">
      <a href="http://127.0.0.1:8000/main/spa"><img src="assets/img/office.svg"></a>
    </template>
    <template v-else-if="Number(state.user) === user.id && user.role === 3  && state.user !== ''">
      <a href="http://127.0.0.1:8000/main/cafe"><img src="assets/img/office.svg"></a>
    </template>
  </div>
  </div>
</template>

<script>
import user from "../user";

export default {
  name: "login",
setup() {
  const {state} = user;
  return {state};
},
data(){
  return {
    persons: [],
  }
},
methods: {
  getUser() {
    this.axios.get('/api/users')
        .then(res => {
          this.persons = res.data.data
        })
  },
},
mounted() {
  this.getUser()
}
}
</script>

<style scoped>

</style>