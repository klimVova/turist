<template>
    <div class="input-data">
        <Datepicker v-model="date"
                    :format="DatePickerFormat"
                    :min-date='new Date()'
                    is-inline
                    locale="ru-ru"
                    model-type="dd MM yyyy"
        />
        <div class="mt-3 people-count d-flex justify-content-sm-between">
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
.input-data{
    width: 450px;
    max-width: 100%;
    margin-top: 10px;
}
@media (max-width: 480px){
    .modal-content-med{
        width: 100%;
        padding: 24px;
    }
    .modal-content-med .section-label{
        padding-left: 0;
    }
    .w-50{
        width: 100%!important;
    }
    .people-count{
        justify-content: space-between;
    }
}
</style>
