@extends('layouts.app')

@section('content')

<h2 class="mb-4">Registrar Vehículo</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('vehicles.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="mb-3">
            <label class="form-label">Placa</label>
            <input type="text"
                name="plate"
                class="form-control"
                placeholder="ABC123"
                value="{{ old('plate') }}">
            <div class="form-text">
                Formato referencial: 3 letras seguidas de 3 números (ej. ABC123)
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Marca</label>
            <input type="text" name="brand" class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="model" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Año de fabricación</label>
            <select name="manufacturing_year" class="form-select">
                @for ($year = date('Y'); $year >= 1980; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
    </div>

    <hr>

    <h5 class="mb-3">Datos del Cliente</h5>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="client_name" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Apellidos</label>
            <input type="text" name="client_lastname" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Nro Documento</label>
            <input type="text" name="client_document" class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Correo</label>
            <input type="email" name="client_email" class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" name="client_phone" class="form-control">
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-save"></i> Guardar
        </button>

        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver
        </a>
    </div>

</form>

@endsection