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
                        :onClickAdd="()=>emit('onClickAddPlus', item)"
                        :isAdded="item.isAdded" />
                    </p>
                </div>
        </div>
    </div>
</template>

<script setup>
import cardMed from "./cardMed.vue";
const emit = defineEmits(['onClickAddPlus'])
defineProps({
    items:Array,
    categories:Array,
    card:Array,
})

const onClickAdd = () => {
            alert('Добавить'); }
</script>
