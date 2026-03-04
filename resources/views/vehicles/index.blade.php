@extends('layouts.app')

@section('content')

<h2 class="mb-1 text-center fw-bold title-custom">Registro de Vehículos</h2>

<a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">
    <i class="fa-solid fa-plus"></i> Registrar Vehículo
</a>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show w-auto mb-3" style="max-width: 500px;" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
@endif

<div class="table-responsive">
    <form action="{{ route('vehicles.index') }}" method="GET">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Cliente</th>
                    <th>N° Documento</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th></th>
                </tr>
                <tr>
                    @php
                        $filters = ['plate','brand','model','manufacturing_year','client_name','client_document','client_email','client_phone'];
                    @endphp
                    @foreach ($filters as $filter)
                        <th class="align-middle">
                            <input type="text" name="{{ $filter }}" class="form-control form-control-sm text-center" 
                                   placeholder="Buscar" value="{{ request($filter) }}">
                        </th>
                    @endforeach
                    <th class="align-middle">
                        <div class="d-flex flex-column gap-1">
                            <button type="submit" class="btn btn-primary btn-sm w-100">Filtrar</button>
                            <a href="{{ route('vehicles.index') }}" class="btn btn-secondary btn-sm w-100">Borrar filtros</a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                <tr>
                    <td class="text-center">{{ $vehicle->plate }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td class="text-center">{{ $vehicle->manufacturing_year }}</td>
                    <td>{{ $vehicle->client_name }} {{ $vehicle->client_lastname }}</td>
                    <td class="text-center">{{ $vehicle->client_document }}</td>
                    <td>{{ $vehicle->client_email }}</td>
                    <td>{{ $vehicle->client_phone }}</td>
                    <td style="width:160px;" class="text-center">
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-info btn-sm" title="Ver">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST"
                                onsubmit="return confirm('¿Está seguro que quiere eliminar el vehículo registrado?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" title="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>

<div class="d-flex justify-content-end mt-3">
    {{ $vehicles->links('pagination::bootstrap-5') }}
</div>

@endsection