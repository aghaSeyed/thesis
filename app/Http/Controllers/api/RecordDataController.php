<?php

namespace App\Http\Controllers\api;

use App\Data;
use App\Http\Resources\Question as QuestionResource;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers ;

class RecordDataController extends Controller
{
    use AuthenticatesUsers;

    public function record(Request $request)
    {
        return response()->json([
                'status' => true,
                'message' => "data recorded on database."
            ], 200);


//        $credentials = $request->only('username');
//        $credentials['password'] = '123456';
//
//        if(Auth('api')->attempt($credentials)){
//            $user =auth('api')->user();
//            $data = new Data();
//            $data->user_id = $user->id;
//            $data->q = $request->data;
//            $data->type = $request->type;
//            $data->save();
//            return response()->json([
//                'status' => true,
//                'message' => "data recorded on database."
//            ], 200);
//        }else
//        {
//            return response()->json([
//                'status' => false,
//                'message' => "unauthorized."
//            ], 401);
//        }
    }

    public function getAll()
    {
        header('Access-Control-Allow-Origin: *');
        $questions = QuestionResource::collection(Question::all());
        return [
          "status" => true,
          "questions"=> $questions,
        ];

    }
}
