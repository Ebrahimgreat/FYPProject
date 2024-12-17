<script setup lang="ts">
const fields=['name','description']


let brands=ref([''])
async function getBrands()
{
    try{
       brands.value= await $fetch('http://127.0.0.1:8000/api/brands',{
            method:'GET'
        })
    }
    catch(error){
        console.log(error)
    }

}
onMounted(()=>{
    getBrands()
})
</script>

<template>

    <div class="w-full border border-gray-200 rounded-xl overflow-auto">


    <table class="w-full border border-gray-200 table-auto">
        <tr class="divide-x divide-gray-200 table-auto">
            <th class="px-4 py-2 border" v-for="item in fields">
                {{item}}
            </th>
        </tr>
            <tr v-for="item in brands">
                <td class="px-4 py-2 border ">{{item.name}}</td>
                <td class="px-4 py-2 border">{{item.description}}</td>
                <td class="px-4 py-2 border">
                    <img src="/icons/view.svg">
                </td>

            </tr>



    </table>

    </div>
</template>

<style scoped>

</style>
