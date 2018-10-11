@include('headerFront')

<div style="position: relative; overflow: hidden; margin-bottom: 20px">
    <div class="progressive-image_container" style="position: absolute; width: 100%; height: 100%;">
        <img src="{{ asset('images/bg_header.png') }}"
             style="width: 100%; height: 100%; transition: -webkit-filter 1.5s ease 0s;">
    </div>
    <div style="position: relative;">
        <section class="ui container _1aP3Hvrg71IsrTM22x8W6m" style="height:20.5rem!important;"><h1
                class="ch2Gspxs_6Su97s_BWokH">Contacto</h1>
        </section>
    </div>
</div>

<div class="container">

    <div class="row" style="margin: 0 auto!important;">

        <div class="col-md-6 col-xl-8 offset-xl-2 py-5">


            <p class="lead">This is a demo for our tutorial dedicated to crafting working Bootstrap contact form with
                PHP and AJAX background.</p>

            <form id="contact-form" method="post" action="contact.php" role="form">

                <div class="messages"></div>

                <div class="controls">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_name">Nombre y Apellido *</label>
                                <input id="form_name" type="text" name="name" class="form-control"
                                       placeholder="Ingrese su Nombre y Apellido *" required="required"
                                       data-error="Firstname is requerido.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_lastname">Teléfono *</label>
                                <input id="form_lastname" type="text" name="surname" class="form-control"
                                       placeholder="Ingrese su Teléfono *" required="required"
                                       data-error="Teléfono is requerido.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="form_email" type="email" name="email" class="form-control"
                                       placeholder="Ingrese su email *" required="required"
                                       data-error="Email requerido.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_need">Motivo de la consulta *</label>
                                <select id="form_need" name="need" class="form-control" required="required"
                                        data-error="Ingrese motivo de la consulta.">
                                    <option value="">Motivo de la consulta</option>
                                    <option value="Sugerencia">Sugerencia</option>
                                    <option value="Otro motivo">Otro motivo</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Mensaje *</label>
                                <textarea id="form_message" name="message" class="form-control"
                                          placeholder="Escribe su mensaje *" rows="4" required="required"
                                          data-error="Ingrese su mensaje."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Send message">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted">
                                <strong>*</strong> These fields are required. Contact form template by
                                <a href="https://bootstrapious.com/p/how-to-build-a-working-bootstrap-contact-form"
                                   target="_blank">Bootstrapious</a>.</p>
                        </div>
                    </div>
                </div>

            </form>

        </div>

        <div class="col-md-4 col-xl-8 offset-xl-2 py-5" style="background-color: #95a5a6">
                <h4><b>¿Cómo podemos ayudarte?</b></h4>
            <p>
                Por consultas o inconvenientes completá el formulario de contacto de la izquierda, hacé click en ayuda en línea o comunicate con nosotros por teléfono.
            </p>
        </div>

    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"
        integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
<script src="contact.js"></script>
@include('footer')
