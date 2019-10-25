<template>
  <v-container>
    <v-alert
      v-if="!desserts"
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
        :items="desserts"
        :single-select="singleSelect"
        :page.sync="page"
        :items-per-page="itemsPerPage"
        hide-default-footer
        item-key="marca"
        show-select
        class="elevation-1"
        @page-count="pageCount = $event"
      >
        <template v-slot:item.action>
          <Actions @edit='edit("teste")' @remove='remove("teste")'></Actions>
        </template>
        <template v-slot:no-data>
          <h3>teste</h3>
        </template>
      </v-data-table>
      <div class="text-center pt-2">
        <v-pagination v-model="page" :length="pageCount"></v-pagination>
      </div>
    </v-card>
    <v-btn bottom color="primary" dark fab fixed right @click.stop="showModal=true">
      <v-icon>mdi-plus</v-icon>
    </v-btn>
    <Modal v-model="showModal" :header="titleModal" :headerIcon="iconModal">
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field label="Marca" required></v-text-field>
        </v-col>
        <v-col cols="12" sm="3">
          <v-select :items="liters" label="Litragem" required></v-select>
        </v-col>
        <v-col cols="12" sm="3">
          <v-select :items="types" label="Tipo" required></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" sm="6" md="4">
          <v-text-field label="Quantidade" required></v-text-field>
        </v-col>
      </v-row>
    </Modal>
  </v-container>
</template>
<script>
import Modal from "../Modal";
import Actions from "../Actions"

export default {
  name: "Refrigerante",
  components: { Modal, Actions },
  data() {
    return {
      singleSelect: false,
      selected: [],
      page: 1,
      pageCount: 0,
      itemsPerPage: 10,
      search: "",
      titleModal: "Adicionar",
      iconModal: "fa fa-pencil-square-o",
      showModal: false,
      liters: ["250ml", "600ml", "1L", "1.5L", "2L", "3L"],
      types: ["Pet", "Garrafa", "Lata"],
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
          value: "litragem"
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
      desserts: [
        {
          marca: "Coca Cola",
          tipo: "Guaraná",
          sabor: "Cajú",
          litragem: "1,5 ml",
          valor: 5
        },
        {
          marca: "São gerardo",
          tipo: "Guaraná",
          sabor: "Cajú",
          litragem: "1,5 ml",
          valor: 5
        }
      ]
    };
  },
};
</script>
<style scoped>
</style>