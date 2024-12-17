<script setup lang="ts">


let units=ref([''])
async function getUnits()
{
    units.value=await $fetch('http://127.0.0.1:8000/api/units',{


    })
}

const products=['Name','Short Name','Allow Decimal','active','edit','delete']
onMounted(()=>{
   getUnits()
})
</script>


<template>


        <h1 class="text-xl font-semibold mb-4">
            Units

        </h1>
    <div class="w-full border border-gray-200 rounded-xl overflow-auto">
    <table class="w-full border border-gray-200 table-auto">
        <tr class="divide-x divide-gray-200">
        <th  class="px-4 py-2 border bg-blue-100" v-for="item in products">
            {{item}}
        </th>
        </tr>
        <tr v-for="item in units" class="divide-x divide-gray-200 hover:bg-gray-500">
            <td class="px-4 py-2 border">
                {{item.name}}

            </td>
            <td class="px-4 py-2">
                {{item.short_name}}
            </td>
            <td class="px-4 py-2">
                {{item.allow_decimal}}
            </td>
            <td class="px-4 py-2">
                {{item.active}}
            </td>
            <td class="px-4 py-2">
              <img src="/icons/edit.svg">
            </td>
            <td class="px-4 py-2">
                <img src="/icons/delete.svg">
            </td>


        </tr>
    </table>
    </div>



</template>

<style scoped>

</style>
