<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\StoreCarRequest;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Models\Car;
// use App\Http\Resources\Car\CarResource;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarResource::collection(Car::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        try {

        $Car = Car::create([
            
        ]);
        if ($Car) {
            return response()->json([
                'message' => 'Car created successfully',
                'data' => new CarResource($Car),
            ], 201);
        }
        return response()->json([
            'message' => 'Car created successfully',
        ], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $Car = Car::query()->findOrFail($id);
            if ($Car) {
                return response()->json([
                    'message' => 'Car fetched successfully',
                    'data' => new CarResource($Car),
                ]);
            }
            return response()->json([
                'message' => 'Car not found',
            ], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, string $id)
    {
        try {
            $Car = Car::query()->findOrFail($id);
            if ($Car) {
                $Car->update([
                    
                ]);
                return response()->json([
                    'message' => 'Car updated successfully',
                    'data' => new CarResource($Car),
                ]);
            }
            return response()->json([
                'message' => 'Car not found',
            ], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $Car = Car::query()->findOrFail($id);
            if ($Car) {
                $Car->delete();
                return response()->json([
                    'message' => 'Car deleted successfully',
                ]);
            }
            return response()->json([
                'message' => 'Car not found',
            ], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
