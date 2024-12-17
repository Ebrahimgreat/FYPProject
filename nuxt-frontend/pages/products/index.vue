<script setup lang="ts">

import {ca} from "cronstrue/dist/i18n/locales/ca";

const fields=['productName','Location','unitPrice','brandName']
let products=ref([])
let productNames=ref([])
let units=ref([])
    async function getProducts()
    {
        try {
             products.value=await $fetch('http://127.0.0.1:8000/api/products',{
                method:'GET'
            })
            productNames.value=products.value.Products

        }
        catch(error)
        {
            console.log(error)
        }
    }

    onMounted(()=>{
        getProducts()
    })
</script>


<template>

    <button-custom>
        Add New Product
    </button-custom>


    <div class="w-full border border-gray-200 rounded-xl overflow-auto">

    <h1 class="text-xl font-semibold mb-4">
        Products
    </h1>


    <table class="w-full border border-gray-200 table-auto hover:bg-gray-400">
        <tr class="divide-x divide-gray-200">
            <th class="px-4 py-2 border bg-blue-100" v-for="item in fields">
                {{item}}
            </th>
        </tr>
        <tr v-for="item in productNames">
            <td>{{item.productName}}</td>
            <td>{{item.productLocation}}</td>
            <td>{{item.productUnitPrice}}</td>
            <td>{{item.brandName}}</td>

        </tr>
    </table>
    </div>
</template>

<style scoped>

</style>
