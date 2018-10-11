
<footer class="content_module new_row new_footer show text-center">
    <div class="row" style="max-width: 80%; margin: 0 auto;">
        <div class="col-md-4">
            <ul style="list-style-type: none;">
                <li>
                    Nosotros
                </li>
                <li>
                    <a href="/contacto">Contacto</a>
                </li>
                <li>
                    Sé parte de iZabor
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <label for="gplay">Descargar app</label><br>
            <a href="https://play.google.com/store/apps/developer?id=Luis+Armando+Mar%C3%ADn" target="_blank">
                <img src="{{ asset('images/mob-button-gplay.png') }}" alt="Disponible en Google Play" style="max-width: 40%!important">
            </a>
        </div>
        <div class="col-md-4 ">
            <label for="social">Siguenos:</label><br>
            <div>
                <ul class="content_social">
                    <li><a href="https://fb.com/izabor" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://instagram.com/izabor" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://twitter.com/izabor" target="_blank"><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center footer" style="font-size: .8em">
        &copy; Copyright {{ date('Y') }} - <a href="#"><b>iZabor</b></a> Diseño y Desarrollo con <i class="fa fa-heart heart"></i> <a href="//marinluis.com" target="_blank">Luis Marín</a>
    </div>
</footer>


{{-- Scripts --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    {{-- Tolltip --}}
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
