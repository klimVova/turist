<template>
    <div v-for="i in id" :key="i.id" class="service-list">
        <cardItemListMeds 
            :key="i.id"
            :card="i"
            :title='i.title'
            :user_id='i.user_id'
            />
    </div>
</template>

<script setup>

import {inject} from "vue";
import cardItemListMeds  from "./cardItemListMeds.vue";

const {id} = inject('id')

</script>
