<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

use App\Models\PlaceType;
use App\Models\Place;
use App\Models\UserInteractLogs;

class PlaceController extends Controller
{
    private $headers = [
        'Content-Type' => 'application/json'
    ];
    // General Place
    // -----------------------------------------------------------------------------
    // -----------------------------------------------------------------------------
    // --------------- Place Type ---------------
    public function addPlaceType(Request $req)
    {
        try {
            $req->validate([
                'inputName' => 'required'
            ]);
            
            DB::beginTransaction();
            $data = PlaceType::create([
                'name' => $req->input('inputName')
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Add Place Type Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Add Place Type Success!',
            'data' => $data
        ], 200, $this->headers);
    }

    
    public function editPlaceType(Request $req)
    {
        try {
            $req->validate([
                'id' => 'required',
                'inputName' => 'required'
            ]);
            $id = $req->input('id');

            DB::beginTransaction();
            $data = PlaceType::findOrFail($id);
            $data->update([
                'name' => $req->input('inputName')
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Update Place Type Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Update Place Type Success!',
            'data' => $data
        ], 200, $this->headers);
    }

    public function deletePlaceType(Request $req)
    {
        try {
            $req->validate([
                'id' => 'required'
            ]);
            $id = $req->input('id');

            DB::beginTransaction();
            $data = PlaceType::findOrFail($id)->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Delete Place Type Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Delete Place Type Success!',
            'data' => null
        ], 200, $this->headers);
    }

    public function getPlaceTypes(Request $req)
    {
        try {
            $data = PlaceType::get();
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Get Place Types Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Place Types Success!',
            'data' => $data
        ], 200, $this->headers);
    }

    // --------------- Place ---------------
    public function addPlace(Request $req)
    {
        try {
            $req->validate([
                'inputName' => 'required',
                'inputTypePlaceId' => 'required',
                'inputRate' => 'required',
                'inputDescription' => 'required',
                'inputImage' => 'required|image|mimes:jpg,png,jpeg|max:500',
                'inputAlamat' => 'required',
                'inputLatitude' => 'required',
                'inputLongitude' => 'required',
            ],
            [
                'inputImage.mimes' => "Tipe file hanya boleh (jpg,png,jpeg)",
                'inputImage.max' => "Ukuran file maksimal 500KB",
            ]);

            $file = $req->file('inputImage');
            $image_name = Str::uuid().'_'.$file->getClientOriginalName();

            DB::beginTransaction();
            $data = Place::create([
                'name' => $req->input('inputName'),
                'type_place_id' => $req->input('inputTypePlaceId'),
                'rate' => $req->input('inputRate'),
                'description' => $req->input('inputDescription'),
                'image_name' => $image_name,
                'alamat' => $req->input('inputAlamat'),
                'latitude' => $req->input('inputLatitude'),
                'longitude' => $req->input('inputLongitude'),
            ]);
            $data = Place::with('place_types')->findOrFail($data->id);
            DB::commit();
            $file->move(public_path('img/destination'), $image_name);
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Add Place Type Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Add Place Type Success!',
            'data' => $data
        ], 200, $this->headers);
    }

    public function editPlace(Request $req)
    {
        try {
            $req->validate([
                'id' => 'required',
                'inputName' => 'required',
                'inputTypePlaceId' => 'required',
                'inputRate' => 'required',
                'inputDescription' => 'required',
                'inputImage' => 'required|image|mimes:jpg,png,jpeg|max:500',
                'inputAlamat' => 'required',
                'inputLatitude' => 'required',
                'inputLongitude' => 'required',
            ],
            [
                'inputImage.mimes' => "Tipe file hanya boleh (jpg,png,jpeg)",
                'inputImage.max' => "Ukuran file maksimal 500KB",
            ]);
            $file = $req->file('inputImage');
            $image_name = Str::uuid().'_'.$file->getClientOriginalName();

            $id = $req->input('id');

            DB::beginTransaction();
            $data = Place::with('place_types')->findOrFail($id);

            $current_img_path = public_path('img/destination/'.$data->image_name);

            $data->update([
                'name' => $req->input('inputName'),
                'type_place_id' => $req->input('inputTypePlaceId'),
                'rate' => $req->input('inputRate'),
                'description' => $req->input('inputDescription'),
                'image_name' => $image_name,
                'alamat' => $req->input('inputAlamat'),
                'latitude' => $req->input('inputLatitude'),
                'longitude' => $req->input('inputLongitude'),
            ]);
            DB::commit();
            if(file_exists($current_img_path)){
                unlink($current_img_path);
            }
            $file->move(public_path('img/destination'), $image_name);
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Update Place Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Update Place Success!',
            'data' => $data
        ], 200, $this->headers);
    }

    public function deletePlace(Request $req)
    {
        try {
            $req->validate([
                'id' => 'required'
            ]);
            $id = $req->input('id');

            DB::beginTransaction();
            $data = Place::findOrFail($id);
            $current_img_path = public_path('img/destination/'.$data->image_name);
            $data->delete();
            DB::commit();
            if(file_exists($current_img_path)){
                unlink($current_img_path);
            }
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Delete Place Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Delete Place Success!',
            'data' => null
        ], 200, $this->headers);
    }

    public function getPlaces(Request $req)
    {
        try {
            $data = Place::with('place_types')
            ->select(['places.*',  DB::raw("(CASE WHEN i.view IS NOT NULL THEN i.view ELSE 0 END) as view")])
            ->leftjoin(DB::raw("(SELECT place_id, COUNT(*) as view FROM user_interact_logs GROUP BY user_interact_logs.place_id) as i"), 'i.place_id', '=', 'places.id');
            $temp = clone $data;
            if($temp->where('i.view', '!=', 'null')->get()->count() <= 5){
                $data->orderBy('rate', 'DESC');
            }else{
                $data->orderBy('view', 'DESC');
            }

            if($req->has('type_place_ids')){
                $type = explode(',', $req->input('type_place_ids'));
                $data->whereRelation('place_types', function($q) use ($type) {
                    $q->whereIn('place_types.id', $type);
                });
            }
            if($req->has('take')){
                $data->take($req->input('take'));
            }
            $data = $data->get();
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Get Places Failed!',
                'errormsg' => $exception->getMessage(),
                'data' => ''
            ], 404, $this->headers);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Places Success!',
            'data' => $data
        ], 200, $this->headers);
    }

    // Hotel
    // -----------------------------------------------------------------------------
    // -----------------------------------------------------------------------------
    public function getHotels(Request $req)
    {
        try {
            $data = Place::with('place_types')
            ->select(['places.*',  DB::raw("(CASE WHEN i.view IS NOT NULL THEN i.view ELSE 0 END) as view")])
            ->leftjoin(DB::raw("(SELECT place_id, COUNT(*) as view FROM user_interact_logs GROUP BY user_interact_logs.place_id) as i"), 'i.place_id', '=', 'places.id');
            $temp = clone $data;
            if($temp->where('i.view', '!=', 'null')->get()->count() <= 5){
                $data->orderBy('rate', 'DESC');
            }else{
                $data->orderBy('view', 'DESC');
            }
            $data->whereRelation('place_types', 'name', '=', "Hotel");
            if($req->has('take')){
                $data->take($req->input('take'));
            }
            $data = $data->get();
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
    
    
    // Destination
    // -----------------------------------------------------------------------------
    // -----------------------------------------------------------------------------
    
    public function getDestinations(Request $req)
    {
        try {
            $data = Place::with('place_types')
            ->select(['places.*',  DB::raw("(CASE WHEN i.view IS NOT NULL THEN i.view ELSE 0 END) as view")])
            ->leftjoin(DB::raw("(SELECT place_id, COUNT(*) as view FROM user_interact_logs GROUP BY user_interact_logs.place_id) as i"), 'i.place_id', '=', 'places.id');
            $temp = clone $data;
            if($temp->where('i.view', '!=', 'null')->get()->count() <= 5){
                $data->orderBy('rate', 'DESC');
            }else{
                $data->orderBy('view', 'DESC');
            }

            if($req->has('type_place_ids')){
                $type = explode(',', $req->input('type_place_ids'));
                $data->whereRelation('place_types', function($q) use ($type) {
                    $q->whereIn('place_types.id', $type);
                });
            }
            $data->whereRelation('place_types', 'name', '!=', "Hotel");
            if($req->has('take')){
                $data->take($req->input('take'));
            }
            $data = $data->get();
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
