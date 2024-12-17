<script setup lang="ts">


import {Bar} from 'vue-chartjs';
import {Line} from 'vue-chartjs'
import {
    Chart as ChartJs,
    Title,
    Tooltip,
    Legend,
    LineElement,

    BarElement, CategoryScale, LinearScale, PointElement

} from "chart.js";
ChartJs.register(Title,Tooltip,Legend,BarElement,CategoryScale,LinearScale,
    LineElement,PointElement)

defineProps({
    data: {
        Object,
        required: true,
    },
    options:{
        type:Object,
        backgroundColor:"#000000",
        responsive:true,
        maintainAspectRatio:false,

        required:false,
        hover:{
            mode:"nearest",
            intersect:true,
        },
        default:()=>({
            responsive:true,


        })

    }



});
</script>

<template>

    <body class="text-blue-700 antialiased">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded">
        <div class="rounded-t mb-9 px-4 py-3">

            <h2 class="uppercase text-blueGray-400 mb-1 text-xs font-semibold">
               <slot>

               </slot>
            </h2>
            <h3 class="text-center text-white">

            </h3>


                <div class="chart-container">


                    <Bar :data="data" :options="options"/>
                </div>
            </div>

    </div>
    </body>
</template>

<style scoped>
.chart-container{
position:relative;
    width:100%;
    height:100%;
}

</style>
