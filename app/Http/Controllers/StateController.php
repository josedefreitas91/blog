<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller {

    public function index() {
        return response(State::where('active', 1)->get()->toJson(JSON_PRETTY_PRINT), 200);
    }

    public function show($id) {
        try {
            $state = State::where('id', $id);
            if (!$state->exists()) {
                return response()->json([
                    "message" => "State not found"
                ], 404);
            }
            $state = $state->first();
            if (!$state->active) {
                return response()->json([
                    "message" => "State not active"
                ], 404);
            }
            $state->country;
            $state->cities;

            return response($state->toJson(JSON_PRETTY_PRINT), 200);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function store(Request $request) {
        try {
            $state = new State;
            $state->name = $request->name;
            $state->country_id = $request->country_id;
            $state->save();
            
            return response()->json([
                "message" => "State record created"
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id) {
        try {
            $state = State::where('id', $id);
            if (!$state->exists()) {
                return response()->json([
                    "message" => "State not found"
                ], 404);
            }
            $state = $state->first();
            $state->name = is_null($request->name) ? $state->name : $request->name;
            $state->country_id = is_null($request->country_id) ? $state->country_id : $request->country_id;
            $state->active = is_null($request->active) ? $state->active : $request->active;
            $state->save();

            return response($state->toJson(JSON_PRETTY_PRINT), 200);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function destroy ($id) {
        try {
            $state = State::where('id', $id);
            if (!$state->exists()) {
                return response()->json([
                    "message" => "State not found"
                ], 404);
            }
            $state->first()->delete();

            return response()->json([
                "message" => "State deleted"
            ], 202);
        } catch (\Throwable $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }
}
