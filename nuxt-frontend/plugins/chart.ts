import {defineNuxtPlugin} from "#app";
import {useNuxtApp} from "#app";
import{defineComponent} from 'vue';
import {
    Chart as ChartJs,
    Title,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
    LineElement,
    PointElement
} from 'chart.js';
import {Bar} from 'vue-chartjs';



Chart.register(Title,BarElement,Title,Legend)


console.log('Chart.js plugin loaded');
nuxtApp.vue.component('BarChart',{
    extends:Bar

})

