<template>
	<div data-app="true">
		<Menu />
		<v-content>
		   <v-container fluid>
		        <!-- <router-view></router-view> -->
		    </v-container>
	     </v-content>  
     </div>
</template>

<script>
    import Menu from './template/Menu'

    export default {
        name: 'App',
        components: { Menu }
    }
</script>
<style>
	* {
		font-family: 'RobotoMono', monospace;
	} 

	body {
		margin: 0;
	}

	#app {
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}
</style>
