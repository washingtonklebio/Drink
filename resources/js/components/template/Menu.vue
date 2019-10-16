<template>
  <span id="inspire">
    <v-navigation-drawer v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
      <v-list dense>
        <template v-for="item in items">
          <v-layout v-if="item.heading" :key="item.heading" align-center>
            <v-flex xs6>
              <v-subheader v-if="item.heading">{{ item.heading }}</v-subheader>
            </v-flex>
            <v-flex xs6 class="text-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-flex>
          </v-layout>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon
          >
            <template v-slot:activator>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title>{{ item.text }}</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </template>
            <v-list-item v-for="(child, i) in item.children" :key="i">
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>{{ child.text }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <router-link class="content-itens" v-else :key="item.text" :to="item.route">
            <v-list-item class="item">
              <v-list-item-action>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>{{ item.text }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </router-link>
        </template>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar class="menu" :clipped-left="$vuetify.breakpoint.lgAndUp" app color="darken-3" dark>
      <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <span class="hidden-sm-and-down">Drink</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <UserDropdown />
    </v-app-bar>
  </span>
</template>

<script>
import UserDropdown from "./UserDropdown";

export default {
  name: "Menu",
  components: { UserDropdown },
  props: {
    source: String
  },
  data: () => ({
    dialog: false,
    drawer: null,
    items: [
      { icon: "home", text: "Dashboard", route: "home" },
      { icon: "chat_bubble", text: "Feedback", route: "auth" },
      { icon: "help", text: "Ajuda", route: "teste" }
    ]
  })
};
</script>
<style scoped>
.menu {
  background: linear-gradient(
    to right,
    rgba(25, 118, 210, 1) 0%,
    rgba(45, 210, 253, 1) 100%
  ) !important;
}

.content-itens {
  text-decoration: none;
}

.content-itens .item {
  border-left: 5px solid #ededed !important;
}

.content-itens .item:hover {
  background-color: #ededed !important;
  border-left: 5px solid rgba(25, 118, 210, 1) !important;
}

.v-list-item__title {
  font-size: 15px !important;
}
</style>