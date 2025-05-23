<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ross Digital') }}</title>

        <meta content="Sistema de gestion de Bufete de abogados" name="description" />
        <meta content="Ross Digital" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('images/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('images/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('./assets/css/dashlite.css?ver=2.9.0') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('./assets/css/theme.css?ver=2.9.0') }}">
        @yield('styles')
    </head>
    <body class="nk-body ui-rounder npc-default has-sidebar ">
        <div class="nk-app-root">
            <div class="nk-sidebar" data-content="sidebarMenu">
                @include('layouts.navigation')
            </div>

            <!-- main @s -->
            <div class="nk-main ">
                <!-- wrap @s -->
                <div class="nk-wrap ">
                    <!-- main header @s -->
                    @include('layouts.header')

                <!-- main header @e -->
                    <!-- content @s -->
                    <div class="nk-content ">
                        <div class="container-fluid">

                            @yield('content')
                            <!--<div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <p>Starter page for Demo7 layout.</p>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <!-- content @e -->
                </div>
                <!-- wrap @e -->
            </div>

        <!-- main @e -->
        </div>
        <!-- app-root @e -->
        <!-- JavaScript -->
        <script src="{{ asset('./assets/js/bundle.js?ver=2.9.0') }}"></script>
        <script src="{{ asset('./assets/js/scripts.js?ver=2.9.0') }}"></script>
        <script>
            (function(NioApp, $){
                'use strict';

                @include('layouts.alerts')

                function mostrarFechaHoraActual() {
                    // Obtener la fecha y hora actual
                    const fechaActual = new Date();

                    // Obtener las horas, minutos y segundos
                    const horas = fechaActual.getHours();
                    const minutos = fechaActual.getMinutes();
                    const segundos = fechaActual.getSeconds();

                    // Obtener el meridiano (AM/PM)
                    const meridiano = horas >= 12 ? "PM" : "AM";

                    // Formatear la hora con dos dígitos
                    const horaFormateada = `${horas.toString().padStart(2, "0")}:${minutos.toString().padStart(2, "0")}:${segundos.toString().padStart(2, "0")} ${meridiano}`;

                    // Formatear la fecha
                    const fechaFormateada = `${fechaActual.getDate().toString().padStart(2, "0")} / ${(fechaActual.getMonth() + 1).toString().padStart(2, "0")} / ${fechaActual.getFullYear()}`;

                    // Actualizar el contenido de un elemento HTML con la fecha y hora formateada
                    document.getElementById("DateToday").textContent = `${fechaFormateada} - ${horaFormateada}`;

                    // Repetir la función cada segundo para actualizar la fecha y hora en tiempo real
                    setTimeout(mostrarFechaHoraActual, 1000);
                }

                    // Iniciar la función para mostrar la fecha y hora actual
                    mostrarFechaHoraActual();

            })(NioApp, jQuery);
        </script>
        @yield('scripts')
    </body>

</html>

