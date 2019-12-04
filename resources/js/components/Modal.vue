<template>
  <v-dialog v-model="show" persistent max-width="35rem">
    <v-card>
      <v-toolbar dark color="primary">
        <v-toolbar-title><v-icon>{{ headerIcon }}</v-icon> {{ header }}</v-toolbar-title>
        <span class="close" @click.stop="show=false">x</span>
      </v-toolbar>
      <v-card-text>
        <v-container>
          <slot></slot>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary" @click.prevent="send" @click.stop="show=false">Salvar</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: {
    value: Boolean,
    header: String,
    headerIcon: String
  },
  computed: {
    show: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit("input", value);
      }
    }
  },
  methods: {
    send() {
      this.$emit('save')
    }
  }
};
</script>
<style scoped>
  .close {
    position: absolute;
    right: 10px;
    top: 10px;
    font-size: 13px;
    font-weight: 600;
    height: 20px;
    width: 20px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    background-color: rgba(0, 0, 0, 0.2);
    cursor: pointer;
  }
</style>