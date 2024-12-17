<script setup lang="ts">

import{ref} from 'vue'
import{useauthStore} from "~/stores/auth";
const authStore=useauthStore();
let authenticated=computed(()=>{
    return authStore.authenticated
})
let name=ref('');


const pages=['Contacts','Orders','Products','Expenses',
    'settings','notifications','User Management','logout']



let dropdown=ref(pages.map(()=>({value:false})));
let dropdownMenuItems=[



    [
        'Suppliers','Customer','Customer Groups'


    ],
    [

    ],
    [
        'Products','Update Price','Print Labels'
        ,'Variations','units','Categories','Brands','Warranties'

    ],
    [

    ],
    ['List Expenses','Add Expense','Expense Categories'

    ],
    [
        'Notificiation'

    ],
    [
        'Users','Roles'

    ],


]


const dropdownComputed=computed(()=> {
    console.log(dropdown.value[0])
    return dropdown.value.map((item, index) => {
        return dropdownMenuItems[index]
    })
});

async function logout()
{
    await authStore.logout();

}


onMounted(()=>{
    name.value=localStorage.getItem('name')
})



</script>

<template>


    <div v-if="authenticated==true" class="flex min-h-screen">

        <div class="sidenav">
            <NuxtLink to="/home" class="dropdown-btn">
                Home
                <div class="fa-carret-down">
                    <img src="/icons/home.svg">
                </div>
            </NuxtLink>
            <NuxtLink to="/pos" class="dropdown-btn">
                POS
                <div class="fa-carret-down">
                <img src="/icons/pos.svg">
                </div>
            </NuxtLink>
            <button class="dropdown-btn">
                Contacts
                <div class="fa-carret-down">
                    <img src="/icons/contacts.svg">
                </div>
                <div class="dropdownicon">
                    <img src="/icons/icon.svg">
                </div>
            </button>
            <button class="dropdown-btn">
                Orders
                <div class="fa-carret-down">
                    <img src="/icons/orders.svg">

                </div>
                <div class="dropdownicon">
                    <img src="/icons/icon.svg">
                </div>
            </button>
            <button class="dropdown-btn">
                Products
                <div class="fa-carret-down">
                    <img src="/icons/products.svg">
                </div>
                <div class="dropdownicon">
                    <img src="/icons/icon.svg">
                </div>
            </button>
            <button class="dropdown-btn">
                Expenses
                <div class="fa-carret-down">
                    <img src="/icons/expenses.svg">
                </div>
                <div class="dropdownicon">
                    <img src="/icons/icon.svg">
                </div>

            </button>
            <button class="dropdown-btn">
                Notifications
                <div class="fa-carret-down">
                    <img src="/icons/notification.svg">
                </div>
            </button>
            <button class="dropdown-btn">
                Roles
                <div class="fa-carret-down">
                    <img src="/icons/contacts.svg">
                </div>
            </button>
            <button class="dropdown-btn">
                Accounts
                <div class="fa-carret-down">
                    <img src="/icons/accounts.svg">
                </div>
                <div class="dropdownicon">
                    <img src="/icons/icon.svg">
                </div>
            </button>
            <button class="dropdown-btn">
                Settings
                <div class="fa-carret-down">
                    <img src="/icons/settings.svg">
                </div>
            </button>
            <button class="dropdown-btn">
                Logout
                <div class="fa-carret-down">

                   <img @click="logout" src="/icons/logout.svg">
                </div>
            </button>

        </div>


        <div class="flex-1 ">

        <div class="topNav">





               <h1 class="text-3xl font-bold text-center text-white">

                   Welcome {{name}}</h1>




        </div>

        <div class="">
            <slot>


            </slot>
        </div>
        </div>

    </div>
    <div v-else>
        <slot>
        </slot>
    </div>


</template>

<style scoped>



.sidenav{

    width:200px;

    display:flex;
    flex-direction:column;
    flex-shrink:0;
    background-color:#111;
    padding-top:20px;

}

 .linkClass:hover{
    color:#f1f1f1;

}
.sidenav button:hover{
    color:#f1f1f1;
}
.sidenav .dropdown-btn{
    padding:6px 8px 6px 16px;
    text-decoration:none;
    font-size:20px;
    color:#818181;
    display:block;
    border:none;
    width:100%;
    text-align:left;
    cursor:pointer;
    outline:none;

}
.dropdown-container{
    padding:6px 8px 6px 16px;
    width:100%;
    border:none;
    outline:none;
    text-align:left;



    background-color:#262626;

}
.topNav{
    background-color:#333;



}
.content-area{
    height:calc(100vh - 48px);
}





@media screen and(max-width:600px){
    .sidenav{
        flex:0 0 60px;
    }

}
@media screen and (max-height:450px) {
    .sidenav{padding-top:15px;}
    .sidenav .links{font-size:18px;}
    .topNav a:not(:first-child){
        display:none;
    }

}


.fa-carret-down{
    float:left;
    padding-right:8px;
    color:white;
}
.dropdownicon{
    float:right;

}
.active{
    background-color:green;
    color:white;
}

</style>
