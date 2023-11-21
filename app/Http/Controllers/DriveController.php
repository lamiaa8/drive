<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use App\Models\Deive;

class DriveController extends Controller
{

    public function alldrive(){
        $drive= Deive::where('status',"public")->get();
        return view('drives.all', compact("drive"));

    }

    public function index()
    {
        //
        $user =auth()->user()->id;
        $drive= Deive::where('userId',$user)->get();
        return view('drives.index', compact("drive"));
    }


    public function create()
    {
        //
        return view("drives.createe");

    }


    public function store(Request $request)
    {
        //
        $drive = New Deive();
        $drive->name = $request->name;
        $drive->discription = $request->discription;
        $drive->status =$request->status;
        //file code


        $file_data = $request->file("file");
        $drive->size = $file_data->getSize();
        $drive_name = time() . $file_data->getClientOriginalName();
        $drive_extetion =$file_data->getClientOriginalExtension();
        $location = public_path("./Upload");
        $file_data->move($location, $drive_name);

        $drive->file =$drive_name;
        $drive->extension =$drive_extetion ;

        $drive->userId = auth()->user()->id;
        $drive->save();

        return redirect()->route("drive.index");

    }

    public function show($id)
    {
        $drive = Deive::find($id);
        return view('drives.show', compact("drive"));
    }

///////////////////////////////////////////////////
    public function edit($id)
    {
        $drive = Deive::find($id);
        return view('drives.edit', compact("drive"));
    }
////////////////////////////////////////////////////////
    public function update(Request $request, $id)
    {

        $drive = Deive::find($id);
        $drive->name = $request->name;
        $drive->discription = $request->discription;
        $drive->status =$request->status;

        $file_data = $request->file("file");


        if($file_data == null){
            $drive_name =$drive->file;
            $drive_extetion = $drive->extension;


        }else
        {
            $drive->size = $file_data->getSize();
            $filePath = public_path("Upload/$drive->file");
            unlink($filePath);
            $drive_name = time() . $file_data->getClientOriginalName();
            $drive_extetion =$file_data->getClientOriginalExtension();
            $location = public_path("./Upload");
            $file_data->move($location, $drive_name);

        }
        $drive->file =$drive_name;
        $drive->extension =$drive_extetion ;


        $drive->userId = auth()->user()->id;
        $drive->save();
        return redirect()->route("drive.show",$drive->id);

    }
///////////////////////////////////////////////////////////////////



    public function destroy($id)
    {
        $drive = Deive::where("id",$id)->first();
        $filePath = public_path("Upload/$drive->file");
            unlink($filePath);
        $drive->delete();
        return redirect()->route("drive.index");
    }




     // /////////////////////////////////////////////////
    public function download($id)
    {
        $drive = Deive::where("id",$id)->first();
        $filePath = public_path("Upload/$drive->file");
        return response()->download($filePath);
    }


    ///////////////////////////////////////////////

    public function changeStatus($id){
        $drive = Deive::find($id);
        if( $drive->status == "private")
        {
            $drive->status = "public";
            $drive->save();

        }
        else
        {
            $drive->status ="private";
            $drive->save();
        }

        return redirect()->back();

    }

    /////////////////////////////////////////////


    public function showPublic($id){
        $drive = Deive::find($id);
        return view('drives.showpublic', compact("drive"));

    }
}
