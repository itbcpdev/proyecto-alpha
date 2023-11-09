<template>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth" style="background-color: #edeae1">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="admin/assets/images/logo-alpha.svg">
                            </div>
                            <form action="/login" method="POST" class="pt-3">
                                <div class="alert alert-danger" role="alert">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="_token" id="token_csrf">
                                    <label for="correo" class="h2">Usuario</label>
                                    <input type="text" class="form-control form-control-lg mb-2" id="correo"
                                        placeholder="correo@example.com" name="correo" >
                                    <span class="text-danger">
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="h2">Contraseña</label>
                                    <input type="password" name="password" class="form-control form-control-lg mb-2" id="password"
                                        placeholder="********">
                                    <span class="text-danger">
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn"
                                        type="submit" style="background-color: #bc9c31 !important;">Iniciar Sesión</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Login',
    data() {
        return {
            token : ''
        }
    },
    mounted: function(){
        this.setToken()
    },
    methods: {
        setToken() {
            let csrf = document.querySelector('meta[name="csrf-token"]').content;
            document.getElementById('token_csrf').value = csrf;
        }
    }
}
</script>

<style>

</style>
