<script setup lang="ts">


const tableFields=['amount','status','expenseCategory','SupplierName','date']
</script>

<template>
    <table class="w-full border border-gray-200 table-auto">
        <tr>
            <th class="px-4 py-2 border bg-blue-100" v-for="item in tableFields">
                {{item}}
            </th>
        </tr>
    </table>

</template>

<style scoped>

</style>
