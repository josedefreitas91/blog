<?php

namespace CountriesTest\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use CountriesTest\Models\Country;

class CountryController extends Controller {

    public function index(Country $country) {
        return response($country::where('active', 1)->get()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function show(Country $country, $id) {
        try {
            $country::where('id', $id);
            if (!$country->exists()) {
                return response()->json([
                    "message" => "Country not found"
                ], 404);
            }
            $country = $country->first();
            if (!$country->active) {
                return response()->json([
                    "message" => "Country not active"
                ], 404);
            }
            $country->states;
            for ($i = 0; $i < count($country->states); $i++) { 
                $country->states[$i]->cities;
            }

            return response($country->toJson(JSON_PRETTY_PRINT), 200);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function store(Country $country, Request $request) {
        try {
            $country->name = $request->name;
            $country->save();
    
            return response()->json([
                "message" => "Country record created"
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }

        // $country::findOrCreate($request->all());
        // return response()->json([
        //     "message" => "Country record created"
        // ], 201);
    }

    public function update(Request $request, $id) {
        try {
            $country = Country::where('id', $id);
            if (!$country->exists()) {
                return response()->json([
                    "message" => "Country not found"
                ], 404);
            }
            $country = $country->first();
            $country->name = is_null($request->name) ? $country->name : $request->name;
            $country->active = is_null($request->active) ? $country->active : $request->active;
            $country->save();

            return response($country->toJson(JSON_PRETTY_PRINT), 200);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function destroy ($id) {
        try {
            $country = Country::where('id', $id);
            if (!$country->exists()) {
                return response()->json([
                    "message" => "Country not found"
                ], 404);
            }
            $country->first()->delete();

            return response()->json([
                "message" => "Country deleted"
            ], 202);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }
}
