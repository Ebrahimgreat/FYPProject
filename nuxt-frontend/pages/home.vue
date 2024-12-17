<script setup lang="ts">
import charts from "~/components/charts.vue"

const stats=['Total Sales','Total Customers','Total Items']
const statValue=['150','8','500']

const chartData=(({
    labels:['January','Febuary','March','April','May','June','July','Aughust','September','October','November','December'],
    datasets:[
        {
            label:'Sales',
            data:[30,20,30,20,10,20,30,40,50,60,70],
            backgroundColor:'#9BD0f5',
            borderColor:'#36A2EB',
            hoverBackgroundColor:'#36A2EB'

        },

    ]
}))
const customerData=(({
    labels:['January','Febuary','March','April','May','June','July','Aughust','September','October','November','December'],
    datasets:[
        {
            label:'Customers',
            data:[10,5,2,14,54,12,42,23,10,12,42],
            backgroundColor:'#FFC0CB'
        }
    ]


}))
const expenses=(({
    labels:['January','Febuary','March','April','May','June','July','Aughust','September','October','November','December'],
    datasets:[
        {
            label:"Expenses",
            data:[10,5,2,14,54,12,42,23,10,12,42],
            backgroundColor:'#FFC0CB'
        }
    ]


}))
const suppliers=(({
    labels:['January','Febuary','March','April','May','June','July','Aughust','September','October','November','December'],
    datasets:[
        {
            label:"Suppliers",
            data:[10,5,2,14,54,12,42,23,10,12,42],
            backgroundColor:'#FFC0CB'
        }
    ]


}))
const chartOptions={
    responsive:true,
    aspectRatio:2
}

definePageMeta({
    layout:'default'
})
</script>

<template>
<div class=" min-h-screen items-center w-full">

        <div class="p-8 bg-gray-800 text-gray-200 grid grid-cols-3">


        <div v-for="(item,index) in stats" class="space-y-3 ml-10" >
        {{item}}
           <div class="text-5xl font-thin" >{{statValue[index]}}
           </div>

        </div>
        </div>
    <div class="bg-amber-200">
        <div class="grid grid-cols-2 gap-4">

        <charts class="flex-auto" :data="chartData" :options="chartOptions">

        </charts>
        <charts :data="customerData" :options="chartOptions">
        </charts>
            <charts :data="expenses" :options="chartOptions">

            </charts>
            <charts :data=suppliers :options="chartOptions">
            </charts>

        </div>
    </div>

    </div>





</template>

<style scoped>

</style>
