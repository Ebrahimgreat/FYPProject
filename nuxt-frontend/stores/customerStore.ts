import{defineStore} from 'pinia'

export const useCustomerStore=defineStore('customer',{
    state:()=>({
        id:''

    }),
    actions:{
        setId(id)
        {
            this.id=id;
        }
    }
})
