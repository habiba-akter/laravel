<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;

class ManufacturerController extends Controller
{
    public function index(){
    	return view('admin.manufacturer.addManufacturer');
    }

    public function saveManufacturer(Request $request){
         $this->manufacturerValidation($request);
         $this->createManufacturer($request);
          return redirect('/manufacturer/add')->with('message','Manufacturer info save successfully');
    }

    private function createManufacturer($request){
         $manufacturer = new Manufacturer();
        $manufacturer->manufacturer_name = $request->manufacturer_name;
         $manufacturer->manufacturer_description = $request->manufacturer_description;
          $manufacturer->publication_status = $request->publication_status;
          $manufacturer->save();
    }

    private function manufacturerValidation($request){
        $this->validate($request,[
          'manufacturer_name'=>'required|unique:manufacturers|max:7',
          'manufacturer_description'=>'required',
        ]);
    }

    public function manageManufacturer(){
      $manufacturers = Manufacturer::all();
      return view('admin.manufacturer.manageManufacturer',['manufacturers'=>$manufacturers]);
    }

    public function unpublishedManufacturer(Request $request){
       $manufacturerById = Manufacturer::find($request->manufacturer_id); 
       $manufacturerById->publication_status = 0;
       $manufacturerById->save();  
       return redirect('/manufacturer/manage')->with('message','Manufacturer info unpublished successfully');
    }
    public function publishedManufacturer(Request $request){
       $manufacturerById = Manufacturer::find($request->manufacturer_id); 
       $manufacturerById->publication_status = 1;
       $manufacturerById->save();  
       return redirect('/manufacturer/manage')->with('message','Manufacturer info published successfully');
    }

    public function editManufacturer(Request $request){
        $manufacturerById = Manufacturer::find($request->manufacturer_id);
        return view('admin.manufacturer.editManufacturer',['manufacturerById'=>$manufacturerById]);
    }

    public function updateManufacturer(Request $request){

      $manufacturerId = $request->manufacturer_id;
       $manufacturer = Manufacturer::find($manufacturerId);
       $manufacturer->manufacturer_name = $request->manufacturer_name;
       $manufacturer->manufacturer_description =$request->manufacturer_description;
       $manufacturer->publication_status =$request->publication_status;
       $manufacturer->save();
       return redirect('/manufacturer/manage')->with('message','Manufacturer info update successfully');
    }

     public function deleteManufacturer(Request $request){
      $manufacturer =Manufacturer::find($request->manufacturer_id);
      $manufacturer->delete();
      return redirect('/manufacturer/manage')->with('message','Manufacturer info Delete successfully');
    }
    
}
