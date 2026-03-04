@extends('layouts.app')

@section('content')

<h2 class="mb-4 text-center fw-bold">Detalle del Registro</h2>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-danger text-white fw-bold">
                Información del Vehículo
            </div>
            <div class="card-body">
                <p><strong>Placa:</strong> {{ $vehicle->plate }}</p>
                <p><strong>Marca:</strong> {{ $vehicle->brand }}</p>
                <p><strong>Modelo:</strong> {{ $vehicle->model }}</p>
                <p><strong>Año de fabricación:</strong> {{ $vehicle->manufacturing_year }}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white fw-bold">
                Información del Cliente
            </div>
            <div class="card-body">
                <p><strong>Nombre completo:</strong> {{ $vehicle->client_name }} {{ $vehicle->client_lastname }}</p>
                <p><strong>N° de documento:</strong> {{ $vehicle->client_document }}</p>
                <p><strong>Correo electrónico:</strong> {{ $vehicle->client_email }}</p>
                <p><strong>Teléfono:</strong> {{ $vehicle->client_phone }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>

    </div>
</div>

@endsection