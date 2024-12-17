<script setup lang="ts">


import{useauthStore} from "~/stores/auth";
const auth=useauthStore();
import {ca} from "cronstrue/dist/i18n/locales/ca";

const credentials=ref({
    email:'',
    password:''
})
async function login()
{
    try {
        await $fetch('http://127.0.0.1:8000/sanctum/csrf-cookie',{
            credentials:'include'
        });
        await auth.login(credentials.value.email, credentials.value.password)

    }


    catch(error){

    }
}
</script>




<template>



    <div class="bg-yellow-400 dark:bg-gray-800 h-screen overflow-hidden flex items-center justify-center">

        <form class="bg-pink shadow-md rounded px-8 pt-6 pb-8 mb-12 w-full">
            <h1 class="text-center text-4xl font-bold text-white">
                Login
            </h1>
            <div class="mb-4">
                <label class="block text-sm text-white font-bold mb-2">
                    Email
                </label>
                <input v-model="credentials.email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="email" placeholder="Username">

                <div class="mb-6">
                    <label class="block text-sm text-white font-bold mb-2" for="password">
                        Password
                    </label>
                    <input v-model="credentials.password" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                </div>

                <button @click="login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Sign in
                </button>

                <NuxtLink to="" class="inline-block align-baseline font-bold text-blue-500 hover:text-blue-800">
                    Forgot Password?
                </NuxtLink>
                <br>
                <NuxtLink to="/register" class="inline-block align-baseline font-bold text-white hover:text-blue-800">
                    Dont have an account? Click here to create a new account.
                </NuxtLink>
            </div>
        </form>
    </div>


</template>

<style scoped>

</style>
