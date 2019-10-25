<template>
    <v-container>
        Dashboard
    </v-container>
</template>

<script>
export default {
    data(){
        return {
            title:true,
            columns: [
                {text:"Nome", sortable: true, value: "name", align:"center"},
                {text:"Email", sortable: true, value: "email", align:"center"},
                {text:"Whatsapp", sortable: true, value: "phone", align:"center"},
                {text:"CNPJ",sortable:true,value:"cnpj",align:"center"},
                {text:"CPF",sortable:true,value:"cpf",align:"center"},
            ],
        }
    },
}
</script>

<style>

</style>
