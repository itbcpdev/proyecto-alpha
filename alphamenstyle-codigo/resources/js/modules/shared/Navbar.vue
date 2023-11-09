<template>
    <header id="alpha-menu">
        <div id="nav-icon">
            <div id="nav-icon3" @click="menuBar()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <nav id="contemedor-menu" v-if="authenticated == true">
            <ul class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/looks/recomendacion-premium">+Looks</a></li>
                <li><a href="/guardarropa">Usar guardarropa</a></li>
                <li><a href="/mislooks">Mis Looks</a></li>
                <li><a href="/profile">Editar perfil</a></li>
                <li><a href="javascript:;" @click="logout">Cerrar Sesión</a></li>
            </ul>
        </nav>
        <nav id="contemedor-menu" v-else>
            <ul class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/login">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
</template>

<script>
import { store } from '../home/store/index'

export default {
    name: 'Navbar',
    beforeMount: function () {
        this.isAuthenticated()
    },
    data() {
        return {
            authenticated: false,
            appPath: process.env.MIX_APP_URL,
            store
        }
    },
    methods: {
        menuBar(){
            document.getElementById('contemedor-menu').classList.toggle("mostrar");
            document.getElementById('nav-icon3').classList.toggle("open");
        },
        isAuthenticated() {
            axios.post(`${this.appPath + '/isAuthenticated'}`)
            .then( response => {
                if(response.data.success == true ){
                    this.authenticated = true;
                    this.store.loggued = true;
                } else {
                    this.authenticated = false;
                    this.store.loggued = false;
                }
            });
        },
        logout() {
            axios.post(`${this.appPath + '/logoutCustomer'}`)
            .then( response => {
                if(response.data.success == true ){
                    window.location.href= '/';
                } else {
                    alert('Lo sentimos no se puede cerrar sesión por el momento comuniquese con el administrador');
                    console.log(response.data.message);
                }
            });
        }
    }
}
</script>

<style>

</style>
