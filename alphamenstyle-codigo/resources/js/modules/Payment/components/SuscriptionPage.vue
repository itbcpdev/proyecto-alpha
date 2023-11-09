<template>
    <span>
        <div class="container position-relative p-0">
            <a href="#" class=""><img :src="appPath + '/web/assets/image/arrow-left.png'"></a>
        </div>
        <div class="margen-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <a href="#" class="card-pago">
                    <div class="tiempo">Mensual</div>
                    <div class="monto">20.00$</div>
                    <div class="cobro">Cobrada Mensualmente</div>
                </a>
                </div>
                <div class="col-md-6">
                <a href="#" class="card-pago active">
                    <div class="tiempo">Anual</div>
                    <div class="monto">17.00$</div>
                    <div class="cobro">Facturado 204.00 $ Anualmente</div>
                    <div class="ahorro">Ahorrar 17%</div>
                </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <div class="contenedor-metodo-pago">
                    <div class="metodo-pago-titulo text-center">
                    ELIGE MÉTODO DE PAGO
                    </div>
                    <div class="py-4">
                    <div class="form-check text-center">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="radioVisa" value="VISA" checked>
                        <label class="form-check-label opcion-pago" for="radioVisa">
                        VISA
                        </label>
                    </div>
                    <div class="form-check text-center">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="radioMastercard" value="Mastercard">
                        <label class="form-check-label opcion-pago" for="radioMastercard">
                        Mastercard
                        </label>
                    </div>
                    <div class="form-check text-center">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="radioPaypal" value="Paypal">
                        <label class="form-check-label opcion-pago" for="radioPaypal">
                        PayPal
                        </label>
                    </div>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control form-pago" name="inpNumeroTarjeta" placeholder="Número Tarjeta" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control form-pago" name="inpMMAA" placeholder="(MM/AA)" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control form-pago" name="inpCVC" placeholder="CVC" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control form-pago" name="inpTitular" placeholder="Nombre del titular de la tarjeta" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control form-pago" name="inpCorreo" placeholder="Correo" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="500">
                    </div>
                    <div class="form-group">
                    <div class="resumen text-center">* El monto de suscripción IGV.</div>
                    </div>
                    <div class="form-group text-center">
                    <a href="#" class="btn btn-mosta">PAGAR</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Modal 1-->
        <div class="modal fade" id="Modal-anuncio-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio error enim explicabo, aut nemo tempore magnam suscipit deleniti recusandae aperiam aliquid dolores ipsam praesentium minima, aliquam doloribus distinctio fugiat.</p>
            </div>
            </div>
        </div>
        </div>
        <!-- Modal 2-->
        <div class="modal fade" id="Modal-terminos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>TÉRMINOS Y CONDICIONES DEL APLICATIVO WEB “ALPHA MEN STYLE”</h1>
                <p><i>Por favor, lea detenidamente el presente documento antes de realizar y utilizar la app de ALPHA MEN STYLE. El presente Documento recoge los Términos y Condiciones de la App desarrollada por R BASHI ASESORIAS EIRL.</i></p>
                <p><strong>R BASHI ASESORIAS E.I.R.L.,</strong> Empresa Individual de Responsabilidad Limitada de nacionalidad peruana, con nombre comercial <strong>LIMEÑA ASESORES DE IMAGEN,</strong> identificado con RUC N° 20604958254, con domicilio en Av. Calle Montes de Oca N°184, Urbanización Valle Hermoso Oeste, Distrito de Santiago de Surco, provincia y departamento de Lima e inscrita en la partida registral N°14316449 del Registro de Personas Jurídicas de Lima, (en lo sucesivo, <strong>“LIMEÑA”</strong> o la <strong>“Sociedad”</strong>), ha desarrollado un aplicativo web,  donde brinda servicios de asesoría especializada en imagen masculina. </p>
                <p>
                Estos Términos y Condiciones de Uso regulan las reglas a que se sujeta la utilización de la Aplicación web que <strong>LIMEÑA</strong> ha desarrollado denominada <b>ALPHA MEN STYLE</b> (en adelante, la <b>“APP”</b>), cuyo acceso se realiza desde la website https://www.alphamenstyle.com/. La utilización en modo prueba y/o registro de la APP atribuye la condición de Usuario a quien lo haga e implica la aceptación de todas las condiciones incluidas en este documento, en la Política de Privacidad, y en los presentes Términos y Condiciones del servicio.
                </p>
                <h2>CLÁUSULA PRIMERA.- OBJETO</h2>
                <p>
                    <b>LIMEÑA</b> ha desarrollado una App, la cual tiene por objeto brindar un servicio donde recomiende a sus usuarios diversos conjuntos de prendas y accesorios que componen looks considerados como los más favorables para su imagen personal. Estos looks son buscados y seleccionados por asesores especializados en imagen masculina, de acuerdo a las necesidades expresadas por los usuarios al marcar el tipo de look que desean, su edad, talla, tipo de cuerpo y el estilo de imagen personal que desean proyectar.
                </p>
                <h2>CLÁUSULA SEGUNDA.- USO</h2>
                <p>
                    El uso de la App por parte del usuario deberá hacerse de forma responsable y de conformidad a la legalidad vigente, la buena fe, los presentes Términos y Condiciones y respetando los derechos de propiedad intelectual e industrial titularidad de <b>LIMEÑA.</b>
                </p>
                <p>
                    El uso de cualquiera de los contenidos de la App con finalidades que sean o pudieran ser ilícitas queda totalmente prohibido, así como la realización de cualquier acción que cause o pueda causar daños o alteraciones de cualquier tipo no consentidas por <b>LIMEÑA,</b> a la Aplicación o a sus contenidos.
                </p>
            </div>
            </div>
        </div>
        </div>
    </span>
</template>

<script>
    export default{
        name: 'Suscription',
        data () {
            return {
                appPath: process.env.MIX_APP_URL,
            }
        }

    }
</script>
