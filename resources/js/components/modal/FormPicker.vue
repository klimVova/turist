<template>
    <div>
        <Datepicker v-model="date"    :format="DatePickerFormat"
                    :min-date='new Date()'
                    is-inline
                    locale="ru-ru"  />
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';
const date = ref(new Date);

</script>
