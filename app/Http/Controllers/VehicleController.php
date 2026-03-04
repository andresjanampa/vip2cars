<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Vehicle::query();

        $columns = ['plate','brand','model','manufacturing_year','client_name','client_document','client_email','client_phone'];

        foreach ($columns as $col) {
            if ($request->filled($col)) {
                $query->where($col, 'like', '%' . $request->$col . '%');
            }
        }

        $vehicles = $query->paginate(15)->withQueryString();

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'plate' => 'required|unique:vehicles',
                'brand' => 'required',
                'model' => 'required',
                'manufacturing_year' => 'required|digits:4',
                'client_name' => 'required',
                'client_lastname' => 'required',
                'client_document' => 'required',
                'client_email' => 'required|email',
                'client_phone' => 'required'
            ],
            [
                'plate.required' => 'La placa es obligatoria.',
                'plate.unique' => 'Este vehículo ya se encuentra registrado.',
                'brand.required' => 'La marca es obligatoria.',
                'model.required' => 'El modelo es obligatorio.',
                'manufacturing_year.required' => 'El año es obligatorio.',
                'client_name.required' => 'El nombre del cliente es obligatorio.',
                'client_lastname.required' => 'El apellido del cliente es obligatorio.',
                'client_document.required' => 'El documento del cliente es obligatorio.',
                'client_email.required' => 'El correo del cliente es obligatorio.',
                'client_email.email' => 'El correo del cliente no es válido.',
                'client_phone.required' => 'El teléfono del cliente es obligatorio.'
            ]
        );

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehículo registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
       $request->validate(
        [
            'plate' => 'required|unique:vehicles,plate,' . $vehicle->id,
            'brand' => 'required',
            'model' => 'required',
            'manufacturing_year' => 'required'
        ],
        [
            'plate.required' => 'La placa es obligatoria.',
            'plate.unique' => 'La placa ya está registrada.',
            'brand.required' => 'La marca es obligatoria.',
            'model.required' => 'El modelo es obligatorio.',
            'manufacturing_year.required' => 'El año es obligatorio.'
        ]
        );

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}
