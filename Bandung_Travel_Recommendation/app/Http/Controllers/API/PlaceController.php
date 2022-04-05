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
            $take = 5;
            if($req->has('take')){
                $take = $req->input('take');
            }
            $data = DB::table('places as p')
            ->join(DB::raw("(SELECT place_id, COUNT(*) as view FROM user_interact_logs GROUP BY user_interact_logs.place_id) as i"), 'i.place_id', '=', 'p.id')
            ->join('place_types as pt', 'pt.id', '=', 'p.type_place_id')
            ->select(['p.*','i.view'])
            ->where('pt.name', '=', "Hotel")
            ->orderBy('view', 'DESC')
            ->take($take)
            ->get();

            if($data->count() <= 5){
                $data = Place::whereRelation('place_types', 'name', '=', "Hotel")
                ->select('*')
                ->addSelect(DB::raw("'0' as view"))
                ->orderBy('rate', 'DESC')
                ->take($take)
                ->get();
            }
            
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Get Top Hotels Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Top Hotels Success!',
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

    
    public function getTopDestinations(Request $req){
        try {
            $take = 5;
            if($req->has('take')){
                $take = $req->input('take');
            }
            $data = DB::table('places as p')
            ->join(DB::raw("(SELECT place_id, COUNT(*) as view FROM user_interact_logs GROUP BY user_interact_logs.place_id) as i"), 'i.place_id', '=', 'p.id')
            ->join('place_types as pt', 'pt.id', '=', 'p.type_place_id')
            ->select(['p.*','i.view'])
            ->where('pt.name', '!=', "Hotel")
            ->orderBy('view', 'DESC')
            ->take($take)
            ->get();

            if($data->count() <= 5){
                $data = Place::whereRelation('place_types', 'name', '!=', "Hotel")
                ->select('*')
                ->addSelect(DB::raw("'0' as view"))
                ->orderBy('rate', 'DESC')
                ->take($take)
                ->get();
            }
            
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Get Top Destinations Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Top Destinations Success!',
            'data' => $data
        ], 200, $this->headers);
    }
}
