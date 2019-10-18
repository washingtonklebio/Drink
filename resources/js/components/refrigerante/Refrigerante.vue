<template>
    <v-container>
        <v-card>
            <v-card-title>
            Refrigerantes
            <v-spacer></v-spacer>
            <v-text-field
                v-model="search"
                append-icon="search"
                label="Pesquisar    "
                single-line
                hide-details
            ></v-text-field>
            </v-card-title>
            <v-data-table
            :headers="headers"
            :items="desserts"
            :search="search"
            ></v-data-table>
        </v-card>
        <v-btn bottom color="primary" dark fab fixed right
        @click=""
        >
        <v-icon>mdi-plus</v-icon>
        </v-btn>
    </v-container>
</template>
<script>
export default {
    data () {
      return {
        search: '',
        headers: [
          {
            text: 'Marca',
            align: 'left',
            sortable: false,
            value: 'marca',
          },
          { text: 'Tipo', value: 'tipo' },
          { text: 'Sabor', value: 'sabor' },
          { text: 'Litragem', value: 'litragem' },
          { text: 'Valor da unidade (R$)', value: 'valor' },
        ],
        desserts: [
          {
            marca: 'São gerardo',
            tipo: 'Guaraná',
            sabor: 'Cajú',
            litragem: '1,5 ml',
            valor: 5,
          },
          {
            marca: 'São gerardo',
            tipo: 'Guaraná',
            sabor: 'Cajú',
            litragem: '1,5 ml',
            valor: 5,
          },
          {
            marca: 'São gerardo',
            tipo: 'Guaraná',
            sabor: 'Cajú',
            litragem: '1,5 ml',
            valor: 5,
          },
          {
            marca: 'São gerardo',
            tipo: 'Guaraná',
            sabor: 'Cajú',
            litragem: '1,5 ml',
            valor: 5,
          },
        ],
      }
    },
  }
</script>

<style scoped>

</style>