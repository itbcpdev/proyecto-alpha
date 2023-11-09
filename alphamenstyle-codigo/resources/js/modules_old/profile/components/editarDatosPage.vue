<template>
  <div class="container">
        <Navbar />
        <div class="row">
            <div class="col-12">
                <h2 class="mt-4">Datos</h2>
                <form action="" class="mt-4" @submit.prevent="validateInfo">
                    <div class="row">
                        <div class="col-12 col-md-6">
                        <div class="form-group" id="container-dato-nombre">
                            <label for="" class="label-update-datos">Nombre</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.nombre" name="inpNombre" placeholder="Nombre" id="datoNombre">
                            <span class="texto-error-datos"></span>
                        </div>
                        <div class="form-group">
                            <label for="" class="label-update-datos">Correo</label>
                            <input disabled type="text" class="form-control form-pago" :value="informationUser.correo" name="inpCorreo" placeholder="Correo" id="datoCorreo">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-update-datos">Profesión</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.profesion" name="inpProfesion" placeholder="Profesión" id="datoProfesion">
                        </div>
                        <div class="form-group" id="container-dato-last-work">
                            <label for="" class="label-update-datos">Último puesto laboral</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.last_work" name="inpPuesto" placeholder="Último puesto laboral" id="datoLastWork">
                            <span class="texto-error-datos"></span>
                        </div>
                        <div class="form-group" id="container-dato-empresa">
                            <label for="" class="label-update-datos">Empresa</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.empresa" name="inpEmpresa" placeholder="Empresa" id="datoEmpresa">
                            <span class="texto-error-datos"></span>
                        </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                            <label for="" class="label-update-datos">Ambientes sociales favoritos</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.favorite_social_locations" name="inpAmbiente" id="datoAmbienteSocial" placeholder="Ambientes sociales favoritos">
                        </div>
                        <div class="form-group">
                            <label for="" class="label-update-datos">Club social</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.club_social" name="inpSocial" placeholder="Club social" id="datoClubSocial">
                        </div>
                        <div class="form-group" id="container-dato-celular">
                            <label for="" class="label-update-datos">Celular</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.celular_number" name="inpCelular" placeholder="Celular" id="datoCelular">
                            <span class="texto-error-datos"></span>
                        </div>
                        <div class="form-group" id="container-dato-rrss">
                            <label for="" class="label-update-datos">RRSS</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.rrss" name="inpRRSS" placeholder="RRSS" id="datoRRSS">
                            <span class="texto-error-datos"></span>
                        </div>
                        <div class="form-group" id="container-dato-ciudad">
                            <label for="" class="label-update-datos">Ciudad</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.ciudad" name="inpCiudad" placeholder="Ciudad" id="datoCiudad">
                            <span class="texto-error-datos"></span>
                        </div>
                        <div class="form-group" id="container-dato-pais">
                            <label for="" class="label-update-datos">Pais</label>
                            <input type="text" class="form-control form-pago" :value="informationUser.pais" name="inpPais" placeholder="Pais" id="datoPais">
                            <span class="texto-error-datos">prueba</span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-mosta" >Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
  </div>
</template>

<script>
import Navbar from '../../shared/Navbar.vue';
export default {
    data(){
        return {
            informationUser : {},
            appPath: process.env.MIX_APP_URL,
        }
    },
    components: {
        Navbar
    },
    created: function () {
        this.getDatosByUser()
    },
    methods: {
        getDatosByUser() {
            axios.get("/getDatosByUser")
                .then( response => {
                    if(response.data.success == true) {
                        this.informationUser = response.data.informationUser;
                    }
                 });
        },
        validateInfo(){
            let countErrors = 0;
            if($('#datoNombre').val() == '') {
                $('#container-dato-nombre .texto-error-datos').css('display', 'block');
                $('#container-dato-nombre .texto-error-datos').html('El Nombre es un campo requerido');
                countErrors++;
            }
            if($('#datoNombre').val() != '') {
                $('#container-dato-nombre .texto-error-datos').css('display', 'none');
                $('#container-dato-nombre .texto-error-datos').html('');
            }
            if($('#datoLastWork').val() == '') {
                $('#container-dato-last-work .texto-error-datos').css('display', 'block');
                $('#container-dato-last-work .texto-error-datos').html('El Último puesto laboral es un campo requerido');
                countErrors++;
            }
            if($('#datoLastWork').val() != '') {
                $('#container-dato-last-work .texto-error-datos').css('display', 'none');
                $('#container-dato-last-work .texto-error-datos').html('');
            }
            if($('#datoEmpresa').val() == '') {
                $('#container-dato-empresa .texto-error-datos').css('display', 'block');
                $('#container-dato-empresa .texto-error-datos').html('La Empresa es un campo requerido');
                countErrors++;
            }
            if($('#datoEmpresa').val() != '') {
                $('#container-dato-empresa .texto-error-datos').css('display', 'none');
                $('#container-dato-empresa .texto-error-datos').html('');
            }
            if($('#datoCelular').val() == '') {
                $('#container-dato-celular .texto-error-datos').css('display', 'block');
                $('#container-dato-celular .texto-error-datos').html('El Celular es un campo requerido');
                countErrors++;
            }
            if($('#datoCelular').val() != '') {
                $('#container-dato-celular .texto-error-datos').css('display', 'none');
                $('#container-dato-celular .texto-error-datos').html('');
            }
            if($('#datoCiudad').val() == '') {
                $('#container-dato-ciudad .texto-error-datos').css('display', 'block');
                $('#container-dato-ciudad .texto-error-datos').html('La Ciudad es un campo requerido');
                countErrors++;
            }
            if($('#datoCiudad').val() != '') {
                $('#container-dato-ciudad .texto-error-datos').css('display', 'none');
                $('#container-dato-ciudad .texto-error-datos').html('');
            }
            if($('#datoPais').val() == '') {
                $('#container-dato-pais .texto-error-datos').css('display', 'block');
                $('#container-dato-pais .texto-error-datos').html('El País es un campo requerido');
                countErrors++;
            }
            if($('#datoPais').val() != '') {
                $('#container-dato-pais .texto-error-datos').css('display', 'none');
                $('#container-dato-pais .texto-error-datos').html('');
            }
            if($('#datoRRSS').val() == '') {
                $('#container-dato-rrss .texto-error-datos').css('display', 'block');
                $('#container-dato-rrss .texto-error-datos').html('El RRSS es un campo requerido');
                countErrors++;
            }
            if($('#datoRRSS').val() != '') {
                $('#container-dato-rrss .texto-error-datos').css('display', 'none');
                $('#container-dato-rrss .texto-error-datos').html('');
            }

            if(countErrors > 0){
                return
            }
            this.updateDatosUser();
        },
        updateDatosUser() {
            let nombre = $('#datoNombre').val();
            let profesion = $('#datoProfesion').val();
            let last_work = $('#datoLastWork').val();
            let company = $('#datoEmpresa').val();
            let favorite_social_locations = $('#datoAmbienteSocial').val();
            let club_social = $('#datoClubSocial').val();
            let celular_number = $('#datoCelular').val();
            let rrss = $('#datoRRSS').val();
            let city = $('#datoCiudad').val();
            let country = $('#datoPais').val();
            axios.post(`${this.appPath + '/update-mis-datos'}`,{
                nombre,
                profesion,
                last_work,
                company,
                favorite_social_locations,
                club_social,
                celular_number,
                rrss,
                city,
                country,
            })
                .then( response => {
                   if(response.data.success == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto',
                            text: response.data.message,
                        }).then(function() {
                            window.location.href = "/profile";
                        });
                   }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.data.message,
                        });
                   }
                });
        }
    },
}
</script>

<style>

</style>
