<template>
	<v-app>
		<Menu v-if="user"/>
		<v-content>
		    <router-view></router-view>
	    </v-content>  
	</v-app>
</template>

<script>
	import { mapState } from 'vuex'
	import { userKey } from '../global'
    import Menu from './template/Menu'

    export default {
        name: 'App',
		components: { Menu},
		computed: mapState(['user']),
		methods: {
			setStorageUser() {
				const userStorage = localStorage.getItem(userKey)
				
				if (userStorage) {
					this.$store.commit('setUser', JSON.parse(userStorage))
				}
			}
		},
		mounted() {
			this.setStorageUser()
		}
    }
</script>
<style>
	* {
		font-family: 'lato', monospace;
	} 

	body {
		margin: 0;
	}

	#app {
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}
</style>
