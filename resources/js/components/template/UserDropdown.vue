<template>
    <div class="user-dropdown">
        <div class="user-button">
            <span>{{ firstName }}</span>
            <div class="user-dropdown-img">
                <Gravatar :email="user.email" alt="Usuário" />
            </div>
            <i class="fa fa-angle-down"></i>
        </div>
        <div class="user-dropdown-content">
            <a @click.prevent="logout"><i class="fa fa-sign-out"></i> Sair</a>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import Gravatar from 'vue-gravatar'
import { userKey } from '../../global';

export default {
    name: 'UserDropdown',
    data() {
        return {
            firstName: this.$store.state.user.name.split(' ')[0]
        }
    },
    components: { Gravatar },
    computed: mapState(['user']),
    methods: {
        logout() {
            localStorage.removeItem(userKey)
            this.$store.commit('setUser', null)
            this.$router.push({ name: 'auth' })
        }
    }
}
</script>

<style scoped>
    .user-dropdown {
        position: relative;
        height: 115%;
        padding: 0px 20px;
        margin-right: -15px;
    }

    .user-button {
        display: flex;
        align-items: center;
        color: #fff;
        font-weight: 100;
        height: 100%;
    }

    .user-dropdown:hover {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .user-dropdown-img {
        margin: 0px 10px;
    }

    .user-dropdown-img > img {
        max-height: 37px;
        border-radius: 5px;
    }

    .user-dropdown-content {
        position: absolute;
        right: 0px;
        background-color: #f9f9f9;
        min-width: 170px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 10px;
        z-index: 1;

        display: flex;
        flex-direction: column;
        flex-wrap: wrap;

        visibility: hidden;
        opacity: 0;
        transition: visibility 0s, opacity 0.5s linear;
    }

    .user-dropdown:hover .user-dropdown-content {
        visibility: visible;
        opacity: 1;
    }

    .user-dropdown-content a {
        text-decoration: none;
        color: rgba(0, 0, 0, 0.87) !important;
        padding: 10px;
    }

    .user-dropdown-content a:hover {
        text-decoration: none;
        color: rgba(0, 0, 0, 0.87) !important;
        background-color: #EDEDED;
    }

    .user-dropdown-content i {
        color:  rgba(0,0,0,.54) !important;
    }
</style>
