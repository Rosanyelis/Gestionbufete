@extends('layouts.app')
@section('content')
                        <!-- start page title -->
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Tableros Kamban (Trello)</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <ul class="nk-block-tools g-3">
                                                <li class="nk-block-tools-opt">
                                                    <a href="{{ route('gestion.create') }}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                    <a href="{{ route('gestion.create') }}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Agregar Gestión</span></a>
                                                </li>
                                            </ul>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="card card-preview">
                                    <div class="card-inner">
                                        <table class="datatable-init table">
                                            <thead>
                                                <tr>
                                                    <th width="25%">Cliente</th>
                                                    <th width="5%" class="text-right"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $gestion)
                                                    <tr>
                                                        <td>
                                                            @if ($gestion->client_id == null)
                                                            <a href="{{ route('gestion.show', $gestion->id) }}">
                                                                Tablero de Administración
                                                            </a>
                                                            @endif
                                                        </td>
                                                        <td class="text-right">
                                                        <div class="dropdown float-right pt-0 pb-0">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger pt-0 pb-0" data-toggle="dropdown">
                                                                <em class="icon ni ni-more-h"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a href="{{ route('cliente.show', $gestion->id) }}">
                                                                            <em class="icon ni ni-eye"></em>
                                                                            <span>Ver</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('gestion.edit', $gestion->id) }}">
                                                                            <em class="icon ni ni-pen-fill"></em>
                                                                            <span>Editar</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="delete-record" data-id="{{ $gestion->id }}">
                                                                            <em class="icon ni ni-power"></em>
                                                                            <span>Eliminar</span>
                                                                        </a>
                                                                        <form id="formDelete-{{ $gestion->id }}" action="{{ route('gestion.destroy', ['id' => $gestion->id]) }}"method="POST">
                                                                            @csrf
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- .card-preview -->
                            </div>
                        </div>
                        <!-- end page title -->

@endsection
@section('scripts')
        <script>
            (function(NioApp, $){
                'use strict';

                $('.datatable-init tbody').on('click', '.delete-record', function(){
                    let dataid = $(this).data('id');
                    let formDelete = $('#formDelete-'+dataid);
                    Swal.fire({
                        title: '¿Está Seguro de Desactivar al Usuario?',
                        text: "Al intentar ingresar al sistema, se le denegará el acceso!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Si, estoy seguro!'
                    }).then((result) => {
                        if (result.value) {
                            $(formDelete).submit();
                        }
                    });
                });

            })(NioApp, jQuery);
        </script>
@endsection
