<script setup lang="ts">

import{useCustomerStore} from "~/stores/customerStore";
let customer=useCustomerStore.id;

</script>

<template>
    {{customer}}

    <div class="p-8 bg-gray-800 text-gray-200">
    </div>



</template>

<style scoped>

</style>
