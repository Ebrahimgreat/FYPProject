<script setup lang="ts">


defineProps({
    show:Boolean
})
</script>

<template>
    <div v-if="show" class="modal-mask">
        <div class="modal-container">
            <div class="modal-header">
            <slot name="header">

            </slot>
            </div>

        <div class="modal-body">
            <slot name="body">

            </slot>
        </div>
        <div class="modal-footer">
            <slot name="footer">
                <button-custom @click="$emit('add')" class="modal-default-Button">
                    Add

                </button-custom>
                <button-custom class="modal-default-button" @click="$emit('close')">
                    Cancel
                </button-custom>

            </slot>
        </div>
        </div>
    </div>


</template>

<style scoped>
.modal-mask{
    position:fixed;
    z-index:9998;
    top:0;
    left:0;
    width:100%;
    height:100%;
    display:flex;
    background-color:rgba(0,0,0,0.5);
    justify-content:center;
    transition:opacity 0.3s ease;
    align-items:center;

}

.modal-header h3{
    margin-top:0;
    color:white;
}
.modal-header{
    position:relative;
    border-bottom:1px solid #eeee;
    justify-content:space-between;


}
.modal-container{
    width:800px;
    margin:auto;
    padding:20px 30px;
    background-color:#fff;
    border-radius:2px;
    box-shadow:0 2px 8px rgba(0,0,0,0.33);

}
.modal-footer{
    padding:15px;
    display:flex;

}
.modal-body{
    position:relative;
    padding:20px 10px;
}
.modal-default-Button{
    float:right;
    font-weight:bold;

}



</style>
