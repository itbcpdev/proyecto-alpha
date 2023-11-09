<template>
    <main>
        <Navbar />
        <div class="container position-relative my-4 align-arrow-movil">
            <a @click="store.decrement()" class="" style="cursor:pointer"><img :src="appPath + '/web/assets/image/arrow-left.png'"></a>
        </div>
        <div class="container position-relative">
            <img :src="appPath + '/web/assets/image/portada-datos.jpg'" class="img-fluid d-block mx-auto">
        </div>
        <div class="container">
            <form action="" id="datos-form" v-on:submit.prevent="submitForm">
                <div class="pregunta text-center mt-4 mb-3 mb-md-4">Solo este <br> último paso ..</div>
                <div class="form-group" id="container-nombre">
                    <input type="text" class="form-control form-paso" id="inpNombre" maxlength="200"  name="inpNombre" placeholder="Nombre">
                    <span class="message-error"></span>
                </div>
                <div class="form-group" id="container-correo">
                    <input type="text" class="form-control form-paso" id="inpCorreo" name="inpCorreo" placeholder="Correo">
                    <span class="message-error"></span>
                </div>
                <div class="form-group position-relative" id="container-password">
                    <input v-if="toggleHidePassword" type="text" class="form-control form-paso" id="inpPassword" name="inpPassword" placeholder="Contraseña">
                    <input v-else type="password" class="form-control form-paso" id="inpPassword" name="inpPassword" placeholder="Contraseña">
                    <span toggle="#password-field" @click="togglePassword()" class="toggle-eyes">
                        <svg v-if="toggleHidePassword" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                            <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                            <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </span>
                    <span class="message-error"></span>
                </div>
                <div class="form-group position-relative" id="container-repeat-password">
                    <input v-if="toggleHidePasswordRepetir" type="text" class="form-control form-paso" id="inpRepitePassword" name="inpRepitePassword" placeholder="Repite la Contraseña">
                    <input v-else type="password" class="form-control form-paso" id="inpRepitePassword" name="inpRepitePassword" placeholder="Repite la Contraseña">
                    <span toggle="#password-field-repeat" @click="togglePasswordRepeat()" class="toggle-eyes">
                        <svg v-if="toggleHidePasswordRepetir" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                            <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                            <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </span>
                    <span class="message-error"></span>
                </div>
                <div class="form-grou">
                    <span class="text-danger my-2" id="messageError"></span>
                </div>
                <div class="mt-3 text-center">
                    <button type="submit" class="btn btn-gris">Genera tu Look</button>
                </div>
            </form>
        </div>
        <Modal />
     </main>
 </template>



 <script>
    import { store } from '../store/index'
    import axios from 'axios'
    import Navbar from '../../shared/Navbar.vue';
    import Modal from './modal/Modal.vue';

    export default {
        data() {
            return {
                appPath: process.env.MIX_APP_URL,
                store,
                toggleHidePassword : false,
                toggleHidePasswordRepetir : false
            };
        },
        components: {
            Navbar,
            Modal
        },
        methods: {
            togglePasswordRepeat(){
                this.toggleHidePasswordRepetir = !this.toggleHidePasswordRepetir;
            },
            togglePassword(){
                this.toggleHidePassword = !this.toggleHidePassword;
            },
            createAndShowResult(){
                /**Datos del Formulario de Registro */
                let nombre = document.getElementById('inpNombre').value;
                let correoClean = document.getElementById('inpCorreo').value;
                let correo = correoClean.trim();
                let password = document.getElementById('inpPassword').value;
                let tipo_look_id = localStorage.getItem('tipo_look_id');
                let estatura_id = localStorage.getItem('estatura_id');
                let edad_id = localStorage.getItem('edad_id');
                let silueta_id = localStorage.getItem('silueta_id');
                let estilo_id = localStorage.getItem('estilo_id');
                axios.post('/registrarUsuario', {
                    nombre,
                    correo,
                    password,
                    tipo_look_id,
                    estatura_id,
                    edad_id,
                    silueta_id,
                    estilo_id
                }).then( response => {
                    if(response.data.success == true) {
                        window.location.href = this.appPath + '/looks/recomendacion';
                    } else {
                        if(response.data.success == false) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.data.message,
                            });
                        }
                    }
                });
            },
            submitForm(e) {
                var regExpEmail = new RegExp('^[a-zA-Z0-9._%+-]+@[a-zAZ0-9.-]+\.[a-z]{2,}$');
                var email = $('#inpCorreo').val();
                let counterErrors = 0
                if($('#inpNombre').val() == '') {
                    $('#container-nombre').addClass('error-customize');
                    $('#container-nombre .message-error').html('El nombre es requerido')
                    counterErrors ++
                }
                if($('#inpNombre').val() != '') {
                    $('#container-nombre').removeClass('error-customize');
                }
                if($('#inpCorreo').val() == '') {
                    $('#container-correo').addClass('error-customize');
                    $('#container-correo .message-error').html('El correo es requerido')
                    counterErrors++
                }
                if($('#inpCorreo').val() != '') {
                    let emailClean = email.trim();
                    console.log(emailClean);
                    if (!regExpEmail.test(emailClean)) {
                        $('#container-correo').addClass('error-customize');
                        $('#container-correo .message-error').html('Ingrese un email correcto')
                        counterErrors++
                    } else {
                        $('#container-correo').removeClass('error-customize');
                    }
                }

                if($('#inpPassword').val() == '') {
                    $('#container-password').addClass('error-customize');
                    $('#container-password .message-error').html('La contraseña es requerida')
                    counterErrors++
                }

                if($('#inpPassword').val() != '') {
                    $('#container-password').removeClass('error-customize');
                }
                if($('#inpRepitePassword').val() == '') {
                    $('#container-repeat-password').addClass('error-customize');
                    $('#container-repeat-password .message-error').html('La contraseña es requerida')
                    counterErrors++
                }
                if($('#inpRepitePassword').val() != '') {
                    if ($('#inpPassword').val() != $('#inpRepitePassword').val()) {
                        $('#container-repeat-password').addClass('error-customize');
                        $('#container-repeat-password .message-error').html('Las contraseñas deben ser iguales')
                        counterErrors++
                    }else {
                        $('#container-repeat-password').removeClass('error-customize');
                    }
                }

                if(counterErrors > 0) return
                this.createAndShowResult()
            }
        },

    }


 </script>

 <style>

 </style>
