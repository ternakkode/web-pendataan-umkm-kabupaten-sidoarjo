<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function productImage(Request $request) {
        $image = $request->file('file');
        
        $fileName = uniqid() . '_' . trim($image->getClientOriginalName());
        
        $image->storeAs('images/product/tmp', $fileName);

        return response()->json([
            'name' => $fileName,
            'original_name' => $image->getClientOriginalName()
        ]);
    }
}
