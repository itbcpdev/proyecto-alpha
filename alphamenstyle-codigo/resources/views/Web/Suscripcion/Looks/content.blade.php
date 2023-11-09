<div class="container position-relative p-0">
    <a href="{{ route('customer.home') }}" class=""><img src="{{ asset('web/assets/image/arrow-left.png') }}"></a>
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
                            <input class="form-check-input" type="radio" name="exampleRadios" id="radioVisa"
                                value="VISA" checked>
                            <label class="form-check-label opcion-pago" for="radioVisa">
                                VISA
                            </label>
                        </div>
                        <div class="form-check text-center">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="radioMastercard"
                                value="Mastercard">
                            <label class="form-check-label opcion-pago" for="radioMastercard">
                                Mastercard
                            </label>
                        </div>
                        <div class="form-check text-center">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="radioPaypal"
                                value="Paypal">
                            <label class="form-check-label opcion-pago" for="radioPaypal">
                                PayPal
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-pago" name="inpNumeroTarjeta"
                            placeholder="Número Tarjeta" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="500">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-pago" name="inpMMAA" placeholder="(MM/AA)"
                            data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-pago" name="inpCVC" placeholder="CVC"
                            data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-pago" name="inpTitular"
                            placeholder="Nombre del titular de la tarjeta" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="500">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-pago" name="inpCorreo" placeholder="Correo"
                            data-aos="fade-up" data-aos-delay="100" data-aos-duration="500">
                    </div>
                    <div class="form-group">
                        <div class="resumen text-center">* El monto de suscripción IGV.</div>
                    </div>
                    <div class="form-group text-center">
                        <a href="{{ route('customer.recomendacion.premium') }}" class="btn btn-mosta">PAGAR</a>
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
                <p>1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio error enim explicabo, aut
                    nemo tempore magnam suscipit deleniti recusandae aperiam aliquid dolores ipsam praesentium minima,
                    aliquam doloribus distinctio fugiat.</p>
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
                <p>2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat odio error enim explicabo, aut
                    nemo tempore magnam suscipit deleniti recusandae aperiam aliquid dolores ipsam praesentium minima,
                    aliquam doloribus distinctio fugiat.</p>
            </div>
        </div>
    </div>
</div>
