@extends('layouts.app')

@section('content')

<h2 class="mb-4">Editar Vehículo</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Placa</label>
            <input type="text"
                   name="plate"
                   class="form-control text-uppercase @error('plate') is-invalid @enderror"
                   value="{{ old('plate', $vehicle->plate) }}"
                   placeholder="Ej: ABC123"
                   style="letter-spacing: 2px;">
            @error('plate')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Marca</label>
            <input type="text"
                   name="brand"
                   class="form-control @error('brand') is-invalid @enderror"
                   value="{{ old('brand', $vehicle->brand) }}">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Modelo</label>
            <input type="text"
                   name="model"
                   class="form-control @error('model') is-invalid @enderror"
                   value="{{ old('model', $vehicle->model) }}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Año de fabricación</label>
            <select name="manufacturing_year"
                    class="form-select @error('manufacturing_year') is-invalid @enderror">
                <option value="">Seleccione año</option>
                @for ($year = date('Y'); $year >= 1980; $year--)
                    <option value="{{ $year }}"
                        {{ old('manufacturing_year', $vehicle->manufacturing_year) == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endfor
            </select>
            @error('manufacturing_year')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <hr>

    <h5 class="mb-3">Datos del Cliente</h5>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Nombre</label>
            <input type="text"
                   name="client_name"
                   class="form-control"
                   value="{{ old('client_name', $vehicle->client_name) }}">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Apellidos</label>
            <input type="text"
                   name="client_lastname"
                   class="form-control"
                   value="{{ old('client_lastname', $vehicle->client_lastname) }}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Nro Documento</label>
            <input type="text"
                   name="client_document"
                   class="form-control"
                   value="{{ old('client_document', $vehicle->client_document) }}">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Correo</label>
            <input type="email"
                   name="client_email"
                   class="form-control"
                   value="{{ old('client_email', $vehicle->client_email) }}">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text"
                   name="client_phone"
                   class="form-control"
                   value="{{ old('client_phone', $vehicle->client_phone) }}">
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-warning">
            <i class="fa-solid fa-pen"></i> Actualizar
        </button>

        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver
        </a>
    </div>

</form>

@endsection