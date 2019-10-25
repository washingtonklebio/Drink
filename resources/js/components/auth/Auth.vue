<template>
	<v-app class="content-login">
		<v-content>
			<v-container fluid fill-height>
				<v-layout align-center justify-center>
					<v-flex class="v-flex-login" xs10 sm5 md3>
						<v-card class="elevation-12 v-card-login">
							<v-card-text>
								<v-row class="logo">
									<img :src="img" alt="logo">
								</v-row>
								<v-form>
									<v-text-field v-if="showSignup" v-model="user.name" label="Nome" name="nome" prepend-icon="person" type="text"></v-text-field>
									<v-text-field v-model="user.email" label="Email" name="email" prepend-icon="mail" type="text"></v-text-field>
									<v-text-field v-model="user.password" id="password" label="Senha" name="password" prepend-icon="lock" type="password"></v-text-field>
									<v-text-field v-if="showSignup" v-model="user.c_password" label="Confirmar senha" name="password_confirmation" prepend-icon="lock" type="password"></v-text-field>
								</v-form>
							</v-card-text>
							<v-card-actions>
								<v-btn v-if="showSignup" @click="signup" block color="primary" dark :loading="loader">Registrar</v-btn>
								<v-btn v-else @click="signin" block color="primary" dark :loading="loader">Login</v-btn>
							</v-card-actions>
							<div class="forgot-password">
								<a @click.prevent="showSignup = !showSignup" v-if="showSignup">Já tem cadastro? Logar</a>
								<a @click.prevent="showSignup = !showSignup" v-else>Não tem cadastro? Registre-se</a>
							</div>
						</v-card>
					</v-flex>
				</v-layout>
			</v-container>
		</v-content>
	</v-app>
</template>

<script>
	import { userKey, baseApiUrl, showError } from '../../global'
	import axios from 'axios'
	import logo from '../../img/drink.png'

	export default {
		name: 'Auth',
		data() {
			return {
				showSignup: false,
				loader: false,
				img: logo,
				user: {},
			}
		},
		methods: {
			signin() {
				this.loader = true
				axios.post(`${baseApiUrl}/signin`, this.user)
					.then(res => {
						this.$store.commit('setUser', res.data)
						localStorage.setItem(userKey, JSON.stringify(res.data))
						this.$router.push({ path: '/home' })
					})
					.catch(error => {
						showError(error)
						this.loader = false
					})
			},
			signup() {
				this.loader = true
				axios.post(`${baseApiUrl}/signup`, this.user)
					.then(res => {
						this.$toasted.global.defaultSuccess(res.data)
						this.user = {}
						this.showSignup = false
					})
					.catch(error => {
						showError(error)
						this.loader = false
					})
			}
		},
	}
</script>
<style scoped>
    .content-login {
        background: linear-gradient(0deg, rgba(25,118,210,1) 0%, rgba(45,210,253,1) 100%) !important;
    }

    .logo {
        display: flex;
        justify-content: center;
		margin-bottom: 2rem;
    }

    .logo img {
        width: 7rem;
        height: 7rem;
    }

    .v-card-login {
        padding: 10px 1rem 2rem;
        border-radius: 2rem;
    }
    .forgot-password {
        margin-top: 3rem;
        display: flex;
        justify-content: center;
    }

    .forgot-password a{
        color: #4e4a4a;
        font-size: 15px;
    }
</style>