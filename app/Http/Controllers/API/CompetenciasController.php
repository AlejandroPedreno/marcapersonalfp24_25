<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenciasResource;
use App\Models\Competencias;
use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public $modelclass = Competencias::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return CompetenciasResource::collection(
            Competencias::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $competencia = json_decode($request->getContent(), true);

        $ciclo = Competencias::create($competencia);

        return new CompetenciasResource($ciclo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Competencias $competencia)
    {
        return new CompetenciasResource($competencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competencias $competencia)
    {
        $competenciaData = json_decode($request->getContent(), true);
        $competencia->update($competenciaData);

        return new CompetenciasResource($competencia);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competencias $competencia)
    {
        try {
            $competencia->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()], 400);
        }
    }
    }
