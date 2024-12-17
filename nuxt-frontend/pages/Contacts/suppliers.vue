<script setup lang="ts">

import {ca} from "cronstrue/dist/i18n/locales/ca";

let suppliers=ref([])


async function getSuppliers()
{
    try{
        suppliers.value=await $fetch('http://127.0.0.1:8000/api/suppliers',{
            method:'GET'
        })
    }
    catch (error)
    {
        console.log(error)
    }
}

const fields=['firstName','LastName','phone','email','Edit','Delete','View']
onMounted(()=>{
    getSuppliers()
})
</script>

<template>

    <div class="w-full border border-gray-200 rounded-xl overflow-auto">
        <table class="w-full border border-gray-200 table-auto">
            <tr class="divide-x divide-gray-200">
                <th class="px-4 py-2 border bg-blue-100" v-for="item in fields">
                    {{item}}
                </th>
            </tr>
                <tr v-for="item in suppliers">

                    <td class="px-4 py-2 border" >{{item.first_name}}</td>
                    <td class="px-4 py-2 border "> {{item.last_name}}</td>
                    <td class="px-4 py-2 border "> {{item.email}}</td>
                    <td class="px-4 py-2 border"> {{item.phone}}</td>
                    <td class="px-4 py-2 border">
                        <img src="/icons/delete.svg">
                    </td>
                    <td class="px-4 py-2 border">
                        <img src="/icons/edit.svg">
                    </td>
                    <td class="px-4 py-2 border">
                        <img src="/icons/view.svg">
                    </td>
                </tr>


        </table>
    </div>

</template>

<style scoped>

</style>
