<template>
    <v-container>
        <div class="boxs">
            <Box title="Refrigerantes" :value="totalRefrigerants"
                icon="fa fa-glass" color="#d54d50"  />    
            <Box title="Tipos" :value="totalTypes"
                icon="fa fa-google-wallet" color="#50436D"  />    
            <Box title="Sabores" :value="totalFlavors"
                icon="fa fa-tint" color="#ff5a00"  />      
        </div>    
    </v-container>
</template>

<script>
import Box from './Box'
import axios from 'axios'
import { baseApiUrl } from './../../global'

export default {
    name: 'Home',
    components: { Box },
    data(){
        return {
            totalRefrigerants: 0,
            totalTypes: 0,
            totalFlavors: 0
        }
    },
    mounted() {
        this.getTotalFlavors(),
        this.getTotalTypes(),
        this.getTotalRefirgerant()
    },
    methods: {
        getTotalFlavors() {
            axios.get(`${baseApiUrl}/flavor`)
            .then(res => {
                this.totalFlavors = res.data.length
            })
            .catch(error => {
                showError(error)
            })
        },
        getTotalTypes() {
            axios.get(`${baseApiUrl}/type`)
            .then(res => {
                this.totalTypes = res.data.length
            })
            .catch(error => {
                showError(error)
            })
        },
        getTotalRefirgerant() {
            axios.get(`${baseApiUrl}/refrigerant/total`)
            .then(res => {
                this.totalRefrigerants = res.data
            })
            .catch(error => {
                showError(error)
            })
        }
    }
}
</script>

<style>
    .boxs {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
</style>
