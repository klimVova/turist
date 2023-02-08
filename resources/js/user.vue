<template>
  <div>
    <ul class="list-group">
      <li class="list-group-item" v-for="item in data">
        <span class="badge badge-primary">#{{ item.id }}</span> {{ item.name }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'User',
  props: ['data'],
  mounted () {
    console.log(this.data)
  }
}
</script>