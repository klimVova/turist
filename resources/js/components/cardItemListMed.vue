<template>
    <div v-for="(i,index) in id" class="service-list">
        <cardItemListMeds
            :key="i.id"
            :card="i"
            :title='i.title'
            :user_id='i.user_id'
            :index="index"
            />
    </div>
</template>

<script setup>

import {inject} from "vue";
import cardItemListMeds  from "./cardItemListMeds.vue";

const {id} = inject('id')

</script>
