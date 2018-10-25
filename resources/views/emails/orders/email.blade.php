<table class="x_container" width="600" cellspacing="0" cellpadding="0" border="0" align="center">
    <tbody>
    <tr>
        <td>
            <table style="background-color:#FFFFFF" width="100%" cellspacing="0" cellpadding="0" border="0"
                   bgcolor="#FFFFFF">
                <tbody>
                <tr style="text-align:left; background-color:#ffffff; border-bottom:1px solid #e6e6e6; margin:0 0 25px 0; width:100%!important; table-layout:fixed; padding:0">
                    <td>
                        <a href="http://izabordev.herokuapp.com/images/logo.png"
                           target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" title="iZabor"><img
                                    data-imagetype="External" src="https://img.pystatic.com/emails/peya-logo-es.png"
                                    alt="iZabor" class="x_logo"
                                    style="width:170px; display:block; margin: 0 auto;"> </a></td>
                </tr>
                <tr>
                    <td>
                        <span style="display: block; text-align: center; font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 30px; color: rgb(76, 78, 78); padding: 0px 0px 25px;">¡Gracias,{{ $order->billing_name }}! </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="display: block; text-align: center; font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 18px; color: rgb(76, 78, 78); padding: 0px 0px 5px;">Tu pedido Número <b>{{ $order->id }}</b> se está preparando.</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="display: block; text-align: center; font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 18px; color: rgb(76, 78, 78); padding: 0px 0px 5px;">Tiempo aproximado de entrega: 00:30 mins. </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="display: block; text-align: center; font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 14px; color: rgb(76, 78, 78); padding: 10px 0px 20px;">Podés comunicarte con nosotros al <a
                                    href="tel:4766-7584" target="_blank" rel="noopener noreferrer"
                                    data-auth="NotApplicable">4766-7584</a>. </span></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <div style="display:block; background:#f6f6f6; padding:20px"><span
                        style="display: block; font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 14px; color: rgb(76, 78, 78); font-weight: bold; padding: 0px 0px 10px;">Tu pedido</span>
                <table style="padding:10px 0" width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td width="420" align="left"><span
                                        style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 12px; color: rgb(76, 78, 78); float: left;">{{ $product->pivot->quantity }} x {{ $product->name }}</span>
                            </td>
                            <td align="right"><span
                                        style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 12px; color: rgb(76, 78, 78); float: right;">${{ $product->price }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"><span
                                        style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 11px; color: rgb(170, 170, 170);">Adicionales: Entera</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <table style="padding:25px 0 0" width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                        <td width="420" align="left"><span
                                    style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 12px; color: rgb(76, 78, 78); display: block; padding: 2px 0px;">Sub-total </span>
                        </td>
                        <td align="right"><span
                                    style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 12px; color: rgb(76, 78, 78); display: block; padding: 2px 0px;">${{ $order->billing_subtotal }} </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="420" align="left"><span
                                    style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 12px; color: rgb(76, 78, 78); display: block; padding: 2px 0px;">Tax </span>
                        </td>
                        <td align="right"><span
                                    style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 12px; color: rgb(76, 78, 78); display: block; padding: 2px 0px;">${{ $order->billing_tax }} </span>
                        </td>
                    </tr>
                    <tr>
                        <td width="420" align="left"><span
                                    style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 14px; color: rgb(76, 78, 78); font-weight: bold; display: block; padding: 2px 0px;">Total </span>
                        </td>
                        <td align="right"><span
                                    style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 14px; color: rgb(76, 78, 78); font-weight: bold; display: block; padding: 2px 0px;">${{ $order->billing_total }} </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <span style="display: block; font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 14px; color: rgb(76, 78, 78); font-weight: bold; padding: 40px 0px 10px;">Dirección de entrega</span>
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                        <td>
                            <span style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 12px; color: rgb(76, 78, 78);">{{ $order->billing_address }} </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <span style="display: block; font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 14px; color: rgb(76, 78, 78); font-weight: bold; padding: 40px 0px 10px;">Medio de pago</span>
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                        <td>
                            <span style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 12px; color: rgb(76, 78, 78);">Efectivo, Contra entrega</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <span style="display: block; font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; font-size: 14px; color: rgb(76, 78, 78); padding: 20px 0px 70px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; text-align: center">El equipo de iZabor Delivery </span>
        </td>
    </tr>
    <tr>
        <td>
            <table style="background-color:#f6f6f6" width="100%" cellspacing="0" cellpadding="0" border="0"
                   bgcolor="#f6f6f6">
                <tbody>
                <tr style="text-align: center;">
                    <td>
                        <span style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; color: rgb(76, 78, 78); font-size: 11px; padding: 20px 20px 0px; display: block;">Descargá la app en tu teléfono <a
                                    href="https://play.google.com/store/apps/developer?id=Luis+Armando+Marín"
                                    target="_blank" rel="noopener noreferrer" data-auth="NotApplicable"
                                    style="color:#0684b4; text-decoration:none">Android</a> • <a
                                    href="https://www.apple.com/itunes/"
                                    target="_blank" rel="noopener noreferrer" data-auth="NotApplicable"
                                    style="color:#0684b4; text-decoration:none">iPhone</a></td>
                </tr>
                <tr>
                    <td>
                        <span style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; color: rgb(76, 78, 78); font-size: 11px; padding: 5px 20px 0px; display: block;">Por cualquier consulta podés escribirnos a <a
                                    href="mailto:soporte@izabor.com" target="_blank" rel="noopener noreferrer"
                                    data-auth="NotApplicable" style="color:#0684b4; text-decoration:none">soporte@izabor.com</a></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span style="font-family: Helvetica, Arial, sans-serif, serif, &quot;EmojiFont&quot;; color: rgb(76, 78, 78); font-size: 11px; padding: 20px; display: block;">iZabor Ⓒ 2018 </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>


{{-- old--}}

{{--@component('mail::message')--}}
    {{--# Order Received--}}

    {{--Thank you for your order.--}}

    {{--**Order ID:** {{ $order->id }}--}}

    {{--**Order Email:** {{ $order->billing_email }}--}}

    {{--**Order Name:** {{ $order->billing_name }}--}}

    {{--**Order Total:** ${{ round($order->billing_total / 100, 2) }}--}}

    {{--**Items Ordered**--}}

    {{--@foreach ($order->products as $product)--}}
        {{--Name: {{ $product->name }} <br>--}}
        {{--Price: ${{ round($product->price / 100, 2)}} <br>--}}
        {{--Quantity: {{ $product->pivot->quantity }} <br>--}}
    {{--@endforeach--}}

    {{--You can get further details about your order by logging into our website.--}}

    {{--@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])--}}
        {{--Go to Website--}}
    {{--@endcomponent--}}

    {{--Thank you again for choosing us.--}}

    {{--Regards,<br>--}}
    {{--{{ config('app.name') }}--}}
{{--@endcomponent--}}
{{-- old--}}