<template>
  <v-container>
    <v-alert
      v-if="desserts.length < 1"
      border="left"
      colored-border
      type="info"
      elevation="2"
    >Nenhum refrigerante cadastrado.</v-alert>
    <v-card v-else>
      <v-card-title>
        Refrigerantes
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="search"
          label="Pesquisar"
          single-line
          hide-details
        ></v-text-field>
      </v-card-title>
      <v-data-table
        v-model="selected"
        :headers="headers"
        :search="search"
        :items="dataTableRefrigerants"
        :single-select="singleSelect"
        :page.sync="page"
        :items-per-page="itemsPerPage"
        hide-default-footer
        item-key="id"
        show-select
        class="elevation-1"
        @page-count="pageCount = $event"
      >
        <template v-slot:item.action="{ item }">
          <Actions @edit="edit(item)" @remove="remove(item)"></Actions>
        </template>
      </v-data-table>
      <div class="text-center pt-2">
        <v-pagination v-model="page" :length="pageCount"></v-pagination>
      </div>
    </v-card>
    <v-btn bottom color="primary" dark fab fixed right @click="resetModal" @click.stop="showModal=true">
      <v-icon>mdi-plus</v-icon>
    </v-btn>
    <Modal v-model="showModal" :header="titleModal" :headerIcon="iconModal" @save="save">
      <input type="hidden" v-model="refrigerant.id">
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field v-model="refrigerant.mark" label="Marca" required></v-text-field>
        </v-col>
        <v-col cols="12" sm="3">
          <v-select v-model="refrigerant.liter" :items="selectLiters" label="Litragem" required></v-select>
        </v-col>
        <v-col cols="12" sm="3">
          <v-select v-model="refrigerant.type" :items="selectTypes" label="Tipo" required></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" sm="4">
          <v-select v-model="refrigerant.flavor" :items="selectFlavors" label="Sabor" required></v-select>
        </v-col>
        <v-col cols="12" sm="6" md="4">
          <v-text-field v-model="refrigerant.quantity" label="Quantidade" required></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="4">
          <v-text-field v-model="refrigerant.amount" label="Valor" required></v-text-field>
        </v-col>
      </v-row>
    </Modal>
  </v-container>
</template>
<script>
import { baseApiUrl, showError } from '../../global'
import axios from 'axios'
import Modal from "../Modal";
import Actions from "../Actions"

export default {
  name: "Refrigerante",
  components: { Modal, Actions },
  data() {
    return {
      refrigerant: {},
      singleSelect: false,
      selected: [],
      page: 1,
      pageCount: 0,
      itemsPerPage: 5,
      search: "",
      titleModal: "Adicionar",
      iconModal: "fa fa-pencil-square-o",
      showModal: false,
      liters: [],
      types: [],
      flavors: [],
      search: "",
      headers: [
        {
          text: "Marca",
          align: "left",
          sortable: false,
          value: "marca"
        },
        {
          text: "Tipo",
          value: "tipo"
        },
        {
          text: "Sabor",
          value: "sabor"
        },
        {
          text: "Litragem",
          align: "center",
          value: "litragem"
        },
        {
          text: "Quantidade",
          align: "center",
          value: "quantidade"
        },
        {
          text: "Valor da unidade (R$)",
          align: "center",
          value: "valor"
        },
        {
          text: "Ações",
          sortable: false,
          value: "action"
        }
      ],
      desserts: []
    }
  },
  mounted(){
    this.getRefrigerant(),
    this.getLiters(),
    this.getFlavors(),
    this.getTypes()
  },
  computed: {
    selectLiters() {
      return this.liters.map(item => ({
        text: item.description,
        value: item.id 
      }))
    },
    selectFlavors() {
      return this.flavors.map(item => ({
        text: item.description,
        value: item.id 
      }))
    },
    selectTypes() {
      return this.types.map(item => ({
        text: item.description,
        value: item.id 
      }))
    },
    dataTableRefrigerants() {
      return this.desserts.map(item => ({
        id: item.id,
        marca: item.mark,
        tipo: item.type.description,
        sabor: item.flavor.description,
        litragem: item.liter.description,
        quantidade: item.quantity,
        valor: item.amount 
      }))
    }
  },
  methods: {
    save() {
      const method = this.refrigerant.id ? 'put' : 'post'
      const id = this.refrigerant.id ? `/${this.refrigerant.id}` : ''
      
      axios[method](`${baseApiUrl}/refrigerant${id}`, this.refrigerant)
        .then(res => {
          this.$toasted.global.defaultSuccess(res.data)
          this.getRefrigerant()
        })
        .catch(error => {
          showError(error)
        })
    },
    edit(data) {

      this.titleModal = 'Editar'
      const dataRefrigerant = this.desserts.find(element => element.id == data.id)

      this.refrigerant.id = dataRefrigerant.id
      this.refrigerant.mark = dataRefrigerant.mark
      this.refrigerant.liter = dataRefrigerant.id
      this.refrigerant.quantity = dataRefrigerant.quantity
      this.refrigerant.flavor = dataRefrigerant.id
      this.refrigerant.type = dataRefrigerant.id
      this.refrigerant.amount = dataRefrigerant.amount

      this.showModal = true
    },
    remove(data) {
      let toast = this.$toasted.show("Deseja realmente excluir isso?", { 
        theme: "bubble", 
        position: "top-center", 
        duration : null,
        action : [
          {
            text : 'Sim',
            onClick : (e, toastObject) => {
              axios.delete(`${baseApiUrl}/refrigerant/${data.id}`)
              .then(res => {
                this.$toasted.global.defaultSuccess(res.data)
                this.getRefrigerant()
              })
              .catch(error => {
                showError(error)
              })

              toastObject.goAway(0);
            }
          },
          {
            text : 'Não',
            onClick : (e, toastObject) => {
              toastObject.goAway(0);
            }
          }
        ],
      });
    },
    getRefrigerant() {
      axios.get(`${baseApiUrl}/refrigerant`)
        .then(res => {
          this.desserts = res.data
        })
        .catch(error => {
          showError(error)
        })
    },
    getLiters() {
      axios.get(`${baseApiUrl}/liter`)
      .then(res => {
        this.liters = res.data
      })
      .catch(error => {
        showError(error)
      })
    },
    getFlavors() {
      axios.get(`${baseApiUrl}/flavor`)
      .then(res => {
        this.flavors = res.data
      })
      .catch(error => {
        showError(error)
      })
    },
    getTypes() {
      axios.get(`${baseApiUrl}/type`)
      .then(res => {
        this.types = res.data
      })
      .catch(error => {
        showError(error)
      })
    },
    resetModal() {
      this.titleModal = 'Adicionar'
      this.refrigerant = {}
    }
  }
};
</script>
<style scoped>
</style>