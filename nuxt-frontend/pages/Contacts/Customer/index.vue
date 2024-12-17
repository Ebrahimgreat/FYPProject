<script setup lang="ts">
import ButtonCustom from "~/components/button-custom.vue";
import {toast} from 'vue3-toastify';
const fields=['firstName','lastName','phone','email','due','balance','Edit','remove','view']
import{useCustomerStore} from "~/stores/customerStore";

let example=['Ebrahim','Shahid','03338663210','ebrahimgreat@gmail.com']
let customers=ref([]);


async function getCustomers()
{
    try {
        customers.value = await $fetch('http://127.0.0.1:8000/api/customers',{
            method:"GET"
        })
    }
    catch(error)
    {
        console.log(error)
    }
}

function viewCustomer(item)
{
    useCustomerStore.setId(item.id)
    navigateTo(
        {
            path:'/Contacts/Customer/show',
            query:{show:item.id}
        }

    )

}
onMounted(()=>{
    getCustomers();
})
</script>

<template>

<h1 class="text-xl font-semibold mb-4"> Customer</h1>
    <div class="w-full border border-gray-200 rounded-xl overflow-auto">
        <create-customer>
        </create-customer>
    <table class="w-full border border-gray-200 table-auto">

        <tr class="divide-x divide-gray-200">
            <th class="px-4 py-2 border bg-blue-100" v-for="item in fields">
                {{item}}
            </th>

        </tr>
        <tr v-for="(item,index) in customers"  class="divide-x divide-gray-200 hover:bg-gray-50">
            <td class="px-4 py-2 border">
                {{item.first_name}}

            </td>
            <td class="px-4 py-2 border" >
                {{item.last_name}}
            </td>
            <td class="px-4 py-2 border" >
                {{item.phone}}
            </td>
            <td class="px-4 py-2 border" >
                {{item.email}}
                <img src="/icons/email.svg" >
            </td>

            <td class="px-3 py-2 border">

            </td>
            <td class="px-3 py-2 border">

            </td>
            <td class="px-4 py-2 border">
                <button @click="viewCustomer(item)">
                    <img src="/icons/edit.svg" class="icon">
                </button>

            </td>
            <td class="px-4 py-2 border">
                <button @click="viewCustomer(item)">
                    <img src="/icons/delete.svg" class="icon">
                </button>
            </td>
            <td class="px-4 py-2 border">
                <button @click="viewCustomer(item)">
                    <img src="/icons/view.svg" class="icon">
                </button>
            </td>




        </tr>





    </table>

    </div>


</template>

<style scoped>
.icon{

}

</style>
