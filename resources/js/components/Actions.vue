<template>
  <v-menu transition="slide-y-transition" offset-y>
    <template v-slot:activator="{ on }">
      <v-btn dark small icon v-on="on">
        <v-icon color="black" small>menu</v-icon>
      </v-btn>
    </template>
    <v-list>
      <v-list-item @click="$emit('edit')">
        <v-icon small>edit</v-icon>Editar
      </v-list-item>
      <v-list-item @click="$emit('remove')">
        <v-icon small>delete</v-icon>Excluir
      </v-list-item>
    </v-list>
  </v-menu>
</template>

<script>
export default {
  name: 'Actions',
  data() {
    return {};
  }
}
</script>