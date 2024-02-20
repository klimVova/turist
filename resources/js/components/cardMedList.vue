<template>
    <div class="service-list">
        <div
                v-for="category in categories"
                :key="category.id">
                <p v-if="category.user_id === card.user_id">{{ category.title }}</p>
                <div v-for="item in items"
                    :key="item.id">
                    <p v-if="item.medical_todo_list_id === category.id && category.user_id === card.user_id && item.deleted_at === null">
                    <cardMed
                        :key="item.id"
                        :title="item.title"
                        :price="item.price"
                        :id="card.id"
                        :onClickAdd="()=>emit('onClickAddPlus', item)"
                        :onClickAddId="()=>emit('addToCartId', card)"
                        :isAdded="item.isAdded" />
                    </p>
                </div>
        </div>
    </div>
</template>

<script setup>
import cardMed from "./cardMed.vue";
const emit = defineEmits(['onClickAddPlus','addToCartId'])

defineProps({
    items:Object  ,
    categories:Object  ,
    card:Object  ,
})
</script>
