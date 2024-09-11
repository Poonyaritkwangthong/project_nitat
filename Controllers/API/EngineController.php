<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Engine;
use Illuminate\Support\Facades\DB;

class EngineController extends Controller
{
    public function index()
    {
        $engines = Engine::all();
        return response()->json([
            'engines' => $engines
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $engines = Engine::create([
                'e_type' => $request->e_type,
                'e_detail' => $request->e_detail,
                'e_hp' => $request->e_hp,
                'e_img' => $request->e_img,
            ]);

            return response()->json([
                'message' => 'Engine successfully create.'
            ], 200);
        } catch (\Exception $e) {
                return response()->json([
                    'message' => "Something went really wrong!"
                ], 500);
        }
    }

    public function show($id)
    {
        $engines = Engine::find($id);
        if (!$engines) {
            return response()->json([
                'message' => 'Engine not found!'
            ], 404);
        }
        return response()->json([
            'message' => $engines
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $engines = Engine::find($id);
            if (!$engines) {
                return $engines()->json([
                    'message' => 'Engine not found!'
                ], 404);
            }

            $engines->e_type = $request->e_type;
            $engines->e_detail = $request->e_detail;
            $engines->e_hp = $request->e_hp;
            $engines->e_img = $request->e_img;

            $engines->save();

            return response()->json([
                'message' => "Engine successfully updated."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function destroy($id)
    {
        $engines = Engine::find($id);
        if (!$engines ) {
            return response()->json([
                'message' => 'Engine not found!'
            ], 404);
        }
        $engines->delete();

        return response()->json([
            'message' => "Engine succesfully daleted."
        ], 200);
    }
}
