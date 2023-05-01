<template>
    <div class="input-data">
        <VueDatePicker v-model="date"
                       range
                       :min-date='new Date()'
                       is-inline
                       :enable-time-picker="false"
                       locale="ru-ru"
                       selectText="Выбрать"
                       cancelText="Отмена"
                       model-type="dd MM yyyy"
                       multiple
        />
    </div>
</template>

<script>
import {ref, onMounted} from 'vue';
import Datepicker from '@vuepic/vue-datepicker';
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'


export default {

    components: {
        Datepicker, VueDatePicker
    },
    data() {
        return {
            date: ref(),
            day: 0,
        }
    },
    onMounted() {
        const startDate = new Date();
        const endDate = new Date(new Date().setDate(startDate.getDate() + 7));
        date.value = [startDate, endDate];
    }


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
