<?php

namespace CountriesTest\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use CountriesTest\Models\City;

class CityController extends Controller {

    public function index(City $city) {
        return response($city::where('active', 1)->get()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function show(City $city, $id) {
        try {
            $city::where('id', $id);
            if (!$city->exists()) {
                return response()->json([
                    "message" => "City not found"
                ], 404);
            }
            $city = $city->first();
            if (!$city->active) {
                return response()->json([
                    "message" => "City not active"
                ], 404);
            }
            $city->state;
            $city->state->country;

            return response($city->toJson(JSON_PRETTY_PRINT), 200);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function store(City $city, Request $request) {
        try {
            $city->name = $request->name;
            $city->state_id = $request->state_id;
            $city->save();
    
            return response()->json([
                "message" => "City record created"
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id) {
        try {
            $city = City::where('id', $id);
            if (!$city->exists()) {
                return response()->json([
                    "message" => "City not found"
                ], 404);
            }
            $city = $city->first();
            $city->name = is_null($request->name) ? $city->name : $request->name;
            $city->state_id = is_null($request->state_id) ? $city->state_id : $request->state_id;
            $city->active = is_null($request->active) ? $city->active : $request->active;
            $city->save();

            return response($city->toJson(JSON_PRETTY_PRINT), 200);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function destroy ($id) {
        try {
            $city = City::where('id', $id);
            if (!$city->exists()) {
                return response()->json([
                    "message" => "City not found"
                ], 404);
            }
            $city->first()->delete();

            return response()->json([
                "message" => "City deleted"
            ], 202);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }
}
