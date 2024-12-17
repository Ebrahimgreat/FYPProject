<script setup lang="ts">



const posItems=['','','ProductName','Quantity','Unit','PurchasePrice','Item Total']
let products=ref([])
let options=ref(['walk in customer'])
let fields=['orderTotal','Eligible for Discount','order Discount','Balance After Order']
let units=ref([])
let unitPrice=ref(0)
let quantity=ref(0)
let productNames=ref([])
let purchasePrices=ref([])
let product1=ref([])
let customers=ref([])
let customerSelected=ref(null)


let productArray=ref([])

let productSelected=ref('There are no items selected')

let eligibleForDiscount=computed(()=>{
    if(customerSelected.value==='Walk in Customer')
    {
        return "Not eligible"
    }

})


async function getData() {
    try {
        customers.value = await $fetch('http://127.0.0.1:8000/api/customers', {
            method: 'GET'
        })
        products.value = await $fetch('http://127.0.0.1:8000/api/products')
        productNames.value=products.value.Products

    }

catch (error)
{
    console.log(error)
}

}

let purchasePrice=ref()
function increment(index)
{
    if(productSelected.value=='There are no items selected')
    {
        return
    }
    else {

        productArray.value[index].quantity++;
    }

}

function decrement(index)
{
    if(productSelected.value=='There are no items selected')
    {
        return
    }

    productArray.value[index].quantity--;

}




function restartOrder()
{
    productSelected.value='There are no items selected';
    quantity.value=0
    customerSelected.value=''

}

function addRow()
{
    let unitPrice=ref(0)
    let unit=ref()

    productNames.value.forEach(item=>
    {

        if(item.productName==productSelected.value)
        {
           unitPrice.value=item.productUnitPrice
            unit.value=item.unit
        }

    })
    const itemTotal=computed(()=>{
        return unitPrice.value*quantity.value
    })

    productArray.value.push({
        'name': productSelected.value,
        quantity:quantity.value,
        unitPrice:unitPrice,
        itemTotal:itemTotal,
        units:units.value
    })
    rows.value++;
}
function orderPlace()
{
    alert('Your order is placed');
}

let orderTotal = computed(() => {
    return unitPrice.value * quantity.value
})

let index=ref(0)

    onMounted(()=>{
    getData()
})






let rows=ref(1)


</script>

<template>








    <label class="block text-sm text-black font-bold mb-2">
        Enter Product Name
    </label>
    <select  v-model="productSelected" class="shadow appearance-none border rounded w-full py-2 px-3">
   <option  v-for="(item) in productNames">
       {{item.productName}}

   </option>
    </select>
    <label class="block text-sm text-black font-bold mb-2">
        Enter quantity
    </label>
   <input v-model="quantity" class="shadow appearance-none border rounded w-full py-2 px-3">

    <button-custom @click="addRow">

        Add another
    </button-custom>

    <table class="border border-gray-200 w-full">
        <tr class="divide-x divide-gray-200">
            <th v-for="items in posItems" class="px-4 py-2 border bg-blue-100">
                {{items}}
            </th>
        </tr>

        <tr v-for="(product,index) in productArray">
            <td class="px-4 py-2">

                <img @click="increment(index)" src="/icons/add.svg">
            </td>
            <td class="px-4 py-2">
                <img @click="decrement(index)" src="/icons/remove.svg">
            </td>
            <td class="px-4 py-2">
              {{product.name}}
            </td>
            <td class="px-4 py-2">
                {{product.quantity}}


            </td>
            <td> {{product.units}}</td>
            <td> {{product.unitPrice}}</td>
            <td> {{product.itemTotal}}</td>
        </tr>

    </table>

    <div class="float-right bg-amber-100 p-16 shadow border" style="width: 500px; min-height: 400px;">

           <label class="block text-sm text-black font-bold">
               Enter Customer Name
           </label>

           <select v-model="customerSelected" class="shadow appearance-none border rounded w-full py-2 px-3">
               <option v-for="item in customers">
                   {{item.first_name}}
               </option>
           </select>
        <label class="block text-sm text-black font-bold">
            Enter Customer Name
        </label>
        <label class="block text-3xl text-black font-bold text-center">
            {{customerSelected}}
        </label>

            <table>
                <tr>

                    <th class="px-4 py-2">
                        Item

                    </th>
                    <th class="px-2 py-2">
                        quantity
                    </th>
                    <th class="px-2 py-4"> Total Cost</th>
                </tr>
                <tr v-for="item in productArray">
                    <td class="px-4 py-2" > {{item.name}}</td>
                    <td class="px-4 py-2"> {{item.quantity}}</td>
                    <td class="px-4 py-2"> {{item.itemTotal}}</td>




                </tr>
            </table>

        <label class="block text-sm text-black font-bold mb-2">
           Total
        </label>
        <label class="block text-sm text-black font-bold mb-2">
            Discount Applicable
        </label>
        <button-custom class="mr-4"> Confirm Order</button-custom>
        <button-custom> Restart Order</button-custom>




       </div>










</template>

<style scoped>


</style>
