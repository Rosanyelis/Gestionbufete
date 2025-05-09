@extends('layouts.app')
@section('content')
                        <!-- start page title -->
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Agregar Gestión</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <ul class="nk-block-tools g-3">
                                                <li class="nk-block-tools-opt">
                                                    <a href="{{ route('cliente.index') }}" class="btn btn-icon btn-secondary d-md-none"><em class="icon ni ni-arrow-left"></em></a>
                                                    <a href="{{ route('cliente.index') }}" class="btn btn-secondary d-none d-md-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Regresar</span></a>
                                                </li>
                                            </ul>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="card card-preview">
                                    <div class="card-inner">
                                        <form class="row gy-2 form-validate" action="{{ route('gestion.store') }}" method="POST">
                                            @csrf
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Clientes</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select form-control form-control-lg" data-search="on"
                                                            name="client_id">
                                                            <option value="">Seleccione un Cliente</option>
                                                            @foreach ($clientes as $item)
                                                            <option value="{{ $item->id }}" @if (old('client_id') == $item->id) selected @endif >{{ $item->firstname }} {{ $item->second_name }} {{ $item->lastname }}{{ $item->second_surname }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('client_id'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('client_id') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="fecha">Fecha</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" name="fecha" class="form-control"
                                                            id="fecha"  value="{{ old('fecha') }}">
                                                        @if ($errors->has('fecha'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('fecha') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="hora">Hora</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="hora" class="form-control time-picker"
                                                            id="hora"  value="{{ old('hora') }}">
                                                        @if ($errors->has('hora'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('hora') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Descripción de la Gestión</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control no-resize" name="task" id="task">{{ old('task') }}</textarea>
                                                        @if ($errors->has('task'))
                                                            <span class="invalid text-danger">
                                                                {{ $errors->first('task') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group float-right">
                                                    <button type="submit" class="btn btn-primary">Guardar Gestión</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- .card-preview -->
                            </div>
                        </div>
                        <!-- end page title -->
@endsection
