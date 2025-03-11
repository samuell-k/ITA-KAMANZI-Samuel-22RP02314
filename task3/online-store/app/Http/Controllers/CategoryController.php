<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class CategoryController extends Controller
{

    public function index()  
    {
        $categories = Category::get();
        
        if($categories->count() > 0){
            return CategoryResource::collection($categories);
        } else {
            return response()->json(['message' => 'No record available'], 200);
        }
    }

   
    public function store(Request $request)  
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'lft' => 'required|integer',
            'rgt' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->errors() 
            ], 422);
        }

        $category = Category::create([
            'name' => $request->name,
            'lft' => $request->lft,
            'rgt' => $request->rgt
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'data' => new CategoryResource($category) 
        ], 200);
    }

    
    public function show(Category $category)  
    {
     
        return new CategoryResource($category);   

    }

    
    public function update(Request $request,Category $category)  
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'lft' => 'required|integer',
            'rgt' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->errors() 
            ], 422);
        }

        $category ->update([
            'name' => $request->name,
            'lft' => $request->lft,
            'rgt' => $request->rgt
        ]);

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => new CategoryResource($category) 
        ], 200);

    }
 
   
    public function destroy(Category $category)  
    {
      $category->delete();
      return response()->json([
        'message' => 'Category Deleted successfully',
       
    ], 200);
    }
}
