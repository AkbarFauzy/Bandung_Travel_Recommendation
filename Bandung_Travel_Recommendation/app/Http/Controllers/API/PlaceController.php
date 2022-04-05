<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\PlaceType;
use App\Models\Place;
use App\Models\UserInteractLogs;

class PlaceController extends Controller
{
    private $headers = [
        'Content-Type' => 'application/json'
    ];

    public function getHotels(Request $req)
    {
        try {
            $data = Place::whereRelation('place_types', 'name', '=', "Hotel")->get();
            // ->makeHidden(['type_place_id']);-
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Get Hotels Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Hotels Success!',
            'data' => $data
        ], 200, $this->headers);
    }

    public function getTopHotels(Request $req){
        try {
            $data = Place::whereRelation('place_types', 'name', '=', "Hotel")->get()
            ->makeHidden(['type_place_id']);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Get Hotels Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Hotels Success!',
            'data' => $data
        ], 200, $this->headers);
    }
    
    
    public function getDestinations(Request $req)
    {
        try {
            $data = Place::with('place_types');
            if($req->has('type_place_id')){
                $type = explode(',', $req->input('type_place_id'));
                $data = $data->whereRelation('place_types', function($q) use ($type) {
                    $q->whereIn('place_types.id', $type);
                })->get();
            }else{
                $data = $data->whereRelation('place_types', 'name', '!=', "Hotel")->get();
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Get Destinations Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Destinations Success!',
            'data' => $data
        ], 200, $this->headers);
    }

    
    public function getDestinationTypes(Request $req)
    {
        try {
            $data = PlaceType::where('name', '!=', "Hotel")->get();
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Get Destination Types Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Destination Types Success!',
            'data' => $data
        ], 200, $this->headers);
    }
}
