<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
   public function index()
   {
        $brands = Brand::all();
            return response()->json([
            'brands' => $brands
        ], 200);
   }
   public function store(Request $request)
   {
        try {
            Brand::create([
                'b_name' => $request->b_name,
                'b_img' => $request->b_img,
                'b_location' => $request->b_location,
                'founded_year' => $request->founded_year,
            ]);

            return response()->json([
                'message' => 'Brand successfully created.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went really wrong!'
            ], 500);
        }
   }

   public function show($id)
   {
    $brands = Brand::find($id);
    if (!$brands) {
        return response()->json([
            'message' => 'Brand not found!'
        ], 404);
    }
    return response()->json([
        'brands' => $brands
    ], 200);
   }

   public function update(Request $request, $id)
   {
        try {
            $brands = Brand::find($id);
            if (!$brands) {
                return $brands()->json([
                    'message' => 'Brand not found!'
                ], 404);
            }

            $brands->b_name = $request->b_name;
            $brands->b_img = $request->b_img;
            $brands->b_location = $request->b_location;
            $brands->founded_year = $request->founded_year;

            $brands->save();

            return response()->json([
                'message' => "Brand successfully update."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
   }

   public function destroy($id)
   {
    $brands = Brand::find($id);
    if (!$brands) {
        return response()->json([
            'message' => 'Brand not found!'
        ], 404);
    }
    $brands->delete();
    return response()->json([
        'message' => "Brand successfully deleted."
    ], 200);
   }
}
