<template>
    <v-app>
        <v-navigation-drawer v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
            <v-list dense>
                <template v-for="item in items">
                    <v-layout v-if="item.heading" :key="item.heading" align-center>
                        <v-flex xs6>
                            <v-subheader v-if="item.heading">
                                {{ item.heading }}
                            </v-subheader>
                        </v-flex>
                        <v-flex xs6 class="text-center">
                            <a href="#!" class="body-2 black--text">EDIT</a>
                        </v-flex>
                    </v-layout>
                    <v-list-group v-else-if="item.children" :key="item.text" v-model="item.model"
                        :prepend-icon="item.model ? item.icon : item['icon-alt']" append-icon="">
                        <template v-slot:activator>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-title>{{ item.text }}</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </template>
                        <v-list-item v-for="(child, i) in item.children" :key="i" @click="">
                            <v-list-item-action v-if="child.icon">
                                <v-icon>{{ child.icon }}</v-icon>
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title>{{ child.text }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-group>
                    <v-list-item v-else :key="item.text" @click="">
                        <v-list-item-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>{{ item.text }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
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
        <v-content>
            <v-container fluid fill-height>
                <v-layout align-center justify-center>
                    <router-view></router-view>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
import UserDropdown from './UserDropdown'

export default {
    name: 'Menu',
    components: { UserDropdown },
    props: {
        source: String,
    },
    data: () => ({
        dialog: false,
        drawer: null,
        items: [
            { icon: 'chat_bubble', text: 'Feedback' },
            { icon: 'help', text: 'Ajuda' },
        ],
    }),
}
</script>
<style scoped>
    .menu {
        background: linear-gradient(to right, rgba(25,118,210,1) 0%, rgba(45,210,253,1) 100%) !important;
    }
</style>