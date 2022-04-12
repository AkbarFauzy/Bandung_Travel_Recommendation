<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DataTables;

class AdminPlaceTypeController extends Controller
{
  public function view(Request $request){
    if($request->ajax()){
      $URL = Http::get(env('API_DOMAIN').'/api/place/type/get-all');
      $data = json_decode($URL->body())->data;
      return Datatables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function($row){
                $btn ='<a class="edit btn btn-warning btn-md" id="btn-update" data-id='.$row->id.' style="margin-right:10px">Update</a>';
                $btn .= '<a class="edit btn btn-danger btn-md" id="btn-delete" data-id='.$row->id.' style="margin-right:10px">Delete</a>';
                return $btn;
              })
              ->rawColumns(['action'])
              ->make(true);
    }

    return view('Backend/PlaceType');
  }

  public function loadForm($id = null){
    $data = null;
    if($id != null){
      $API = Http::get(env('API_DOMAIN').'/api/place/type/get-by-id/'.$id);
      $data = json_decode($API->body())->data;
    }
    return view('Backend/Form/PlaceTypeForm')
            ->with('data', $data);
  }

  public function create(Request $request){
    $response = Http::asForm()->post(env('API_DOMAIN').'/api/place/type/add', $request);
    return $response->body();
  }

  public function update(Request $request){
    $response = Http::asForm()->post(env('API_DOMAIN').'/api/place/type/edit', $request);
    return $response->body();
  }

  public function delete($id){
    $response = Http::delete(env('API_DOMAIN').'/api/place/type/delete/'.$id);
    return $response->body();
  }

}
