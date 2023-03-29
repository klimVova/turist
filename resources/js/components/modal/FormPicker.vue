<template>
    <div class="w-50 mt-3">
        <Datepicker v-model="date"
                    :format="DatePickerFormat"
                    :min-date='new Date()'
                    is-inline
                    locale="ru-ru"
                    model-type="dd MM yyyy"
        />
        <div class="mt-3 d-flex justify-content-sm-between">
            <p class="count-people">Количество человек:</p>
            <input class="w-25 count-people-input" type="text" v-model="countPeople">
        </div>
    </div>
</template>

<script>
import {ref} from 'vue';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';

const date = ref(new Date);
export default {

    components: {
        Datepicker
    },
    data() {
        return {
            date: ref(new Date),
            countPeople: 1,
        }
    },
}
</script>
<style scoped>
.count-people {
    margin: 0;
}

.count-people-input {
    text-align: center;
    border: 1px solid #aaaeb7;
    border-radius: 3px;
}
</style>
