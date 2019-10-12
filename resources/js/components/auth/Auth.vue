<template>
	<v-app class="content-login">
		<v-content>
			<v-container fluid fill-height>
				<v-layout align-center justify-center>
					<v-flex class="v-flex-login" xs10 sm5 md3>
						<v-card class="elevation-12 v-card-login">
							<v-card-text>
								<v-row class="logo">
									<img src="https://vuetifyjs.com/apple-touch-icon-180x180.png" alt="avatar">
								</v-row>
								<v-form>
									<v-text-field label="Login" name="login" prepend-icon="person" type="text"></v-text-field>
									<v-text-field id="password" label="Senha" name="password" prepend-icon="lock" type="password"></v-text-field>
								</v-form>
							</v-card-text>
							<v-card-actions>
								<v-btn block color="primary" dark>login</v-btn>
							</v-card-actions>
							<div class="forgot-password">
								<a>Esqueceu a senha?</a>
							</div>
						</v-card>
					</v-flex>
				</v-layout>
			</v-container>
		</v-content>
	</v-app>
</template>

<script>
  export default {
  }
</script>
<style scoped>
    .content-login {
        background: linear-gradient(0deg, rgba(25,118,210,1) 0%, rgba(45,210,253,1) 100%) !important;
    }

    .logo {
        display: flex;
        justify-content: center;
    }

    .logo img {
        width: 8rem;
        height: auto;
    }

    .v-card-login {
        padding: 2rem 1rem 2rem;
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