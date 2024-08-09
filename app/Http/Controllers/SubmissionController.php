<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;  

use App\Jobs\ProcessSubmission;

class SubmissionController extends Controller
{
    public function submit(Request $request)  
    {  
        $validator = Validator::make($request->all(), [  
            'name' => 'required|string',  
            'email' => 'required|email',  
            'message' => 'required|string',  
        ]);  

        if ($validator->fails()) {  
            return response()->json(['error' => 'Invalid data input'], 422);  
        }  

        ProcessSubmission::dispatch($request->all());  

        return response()->json(['success' => 'Your submission is being processed.'], 200);  
    }
}


