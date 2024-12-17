<script setup lang="ts">

import './modal.vue';


let customerFields=['firstName','lastName','Email Address','Country','State','City','Balance']
function close()
{
    alert('hello');

}


let show=ref(false)
console.log(show.value)
</script>

<template>


<button-custom @click="show=true">
   Create a new Customer
</button-custom>
    <teleport to="body">
        <modal :show="show" @close="show=false">
            <template #header>
                Creating a customer
            </template>
            <template #body>



               <div class=" text-gray-500 font-bold mb:1 mb-0 pr-4" v-for="item in customerFields">
                   <label class=" text-gray-500 font-bold mb:1 mb-0 pr-4">
                       {{item}}
                   </label>
                       <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full
py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">


               </div>

            </template>

        </modal>


    </teleport>
</template>

<style scoped>

</style>
