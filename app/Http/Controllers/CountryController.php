<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller {

    public function index() {
        return response(Country::where('active', 1)->get()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function show($id) {
        $country = Country::where('id', $id);
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

        return response($country->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function store(Request $request) {
        $country = new Country;
        $country->name = $request->name;
        $country->save();
  
        return response()->json([
            "message" => "Country record created"
        ], 201);
    }

    public function update(Request $request, $id) {
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
    }

    public function destroy ($id) {
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
    }
}
