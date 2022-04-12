<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Place;
use DataTables;

class AdminDestinationController extends Controller
{
  public function view(Request $request){
    if($request->ajax()){
      $URL = Http::get(env('API_DOMAIN').'/api/place/get-all');
      $data = json_decode($URL->body())->data;
      return Datatables::of($data)
              ->addIndexColumn()
              ->addColumn('type_place_id', function($place){
                return $place->place_types->name;
              })
              ->addColumn('action', function($row){
                $btn = '<a class="edit btn btn-primary btn-md" id="btn-view" data-id='.$row->id.' style="margin-right:10px">View</a>';
                $btn .='<a class="edit btn btn-warning btn-md" id="btn-update" data-id='.$row->id.' style="margin-right:10px">Update</a>';
                $btn .= '<a class="edit btn btn-danger btn-md" id="btn-delete" data-id='.$row->id.' style="margin-right:10px">Delete</a>';
                return $btn;
              })
              ->rawColumns(['type_place_id','action'])
              ->make(true);
    }

    return view('Backend/Destination');
  }

  public function loadForm($id = null){
    $data = null;
    $APIDestinationTypes = Http::get(env('API_DOMAIN').'/api/place/type/get-all');
    $destinationData = json_decode($APIDestinationTypes->body())->data;
    if($id != null){
      $API = Http::get(env('API_DOMAIN').'/api/place/'.$id);
      $data = json_decode($API->body())->data;
    }
    return view('Backend/Form/DestinationForm')
            ->with('data', $data)
            ->with('destination_types', $destinationData);
  }

  public function create(Request $request){
    $response = Http::withToken(env('API_KEY'))
    ->attach('inputImage', fopen($request->inputImage, 'r'))
    ->post(env('API_DOMAIN').'/api/place/add', [
        'inputName' => $request->inputName,
        'inputDescription' => $request->inputDescription,
        'inputTypePlaceId' => $request->inputTypePlaceId,
        'inputLongitude' => $request->inputLongitude,
        'inputLatitude' => $request->inputLatitude,
        'inputRate'=>$request->inputRate,
        'inputAlamat'=>$request->inputAlamat,
      ]);
    return $response;
  }

  public function update(Request $request){
    $response = Http::asForm()->post(env('API_DOMAIN').'/api/place/edit', $request);
    return $response;
  }

  public function delete($id){
    $response = Http::delete(env('API_DOMAIN').'/api/place/delete/'.$id);
    return $response->body();
  }

}
