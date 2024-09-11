<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with(['engine', 'brand'])->get();
        // return Json Response
        return  response()->json([
            'cars' => $cars
        ], 200);
    }
    public function store(Request $request)
    {

            $validator = Validator::make(
                $request->all(),
                [
                    'c_name' => 'required|string|max:255',
                    'c_img' => 'required|string|max:255',
                    'c_detail' => 'required|string|max:255',
                    'c_engine_id' => 'required|exists:engine,id',
                    'c_brand_id' => 'required|exists:brand,id',
                ]
                );

            if ($validator->fails()) {
                return response()->json(['status' => 422, 'errors' => $validator->errors()], 422);
            } else {

                try {
                    if (Car::create($request->all())) {
                        return response()->json(['status' => 200, 'message' => 'Add car successfully'], 200);
                    } else {
                        return response()->json(['status' => 400, 'message' => 'Something went wrong!'], 400);
                    }
                } catch (\Exception $e) {
                    return response()->json(['message' => 'มีบางอย่างผิดพลาดจริงๆ!'], 500);
                }
            }

    }

    public function show($id)
    {
        $cars = Car::find($id);
        if (!$cars) {
            return response()->json([
                'massage' => 'Car not found!'
            ], 404);
        }
        return response()->json([
            'cars' => $cars
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $cars = Car::find($id);
            if (!$cars) {
                return $cars()->json([
                    'message' => 'Car not found!'
                ], 404);
            }
                $cars->c_name = $request->c_name;
                $cars->c_img = $request->c_img;
                $cars->c_detail = $request->c_detail;
                $cars->c_engine_id = $request->c_engine_id;
                $cars->c_brand_id = $request->c_brand_id;

                $cars->save();

                return response()->json([
                    'message' => "Car successfully update."
                ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    public function destroy($id)
    {
        $cars = Car::find($id);
        if (!$cars) {
            return response()->json([
                    'message' => "Car not found"
                ], 404);
        }

        $cars->delete();

        return response()->json([
            'message' => "Car successfully deleted."
        ], 200);
    }
}
