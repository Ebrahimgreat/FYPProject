import {storeToRefs} from 'pinia';
import{useauthStore} from "~/stores/auth";

export default defineNuxtRouteMiddleware((to,from)=> {
    console.log('From middleware')
    const {authenticated} = storeToRefs(useauthStore());
    const authStore=useauthStore();
    const{name}=storeToRefs(useauthStore());


    const token = useCookie('token')

        if (token.value) {
            authenticated.value=true
        }
        if (token.value ==null && to.path!='/login') {
            return navigateTo('/login')
        }
        else if(token.value && to?.name==='login')
        {
            return navigateTo('/home')
        }
})
