<?php

namespace App\Http\Controllers\backEnd\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Admin;
use App\TablePermission;

class AdminController extends Controller
{
    public function Admins(){
      return view('Inbackground.admin.Admins');
      
     
    }//admins
    public function ShowCreate(){
        return view("Inbackground.admin.ShowCreate");
    }
   

    public function Create(Request $request){
    
        // this for insert new Admin 
        $admin =new Admin();

        $admin->insert($request->except('admin','category','product','confirmPassword'));
        // this is the tables that will added persmission on it
        $tables = ['admin'=>$request->admin,'category'=>$request->category,'product'=>$request->product];

        // get id for the admin that current register form this request get him from table adims to use in table TablePermission
        $RequestedAdmin = Admin::where('email',$request->email)->get()->first();
        //for insert new permission for all tables
        foreach($tables as $key => $table){
          $tab = new TablePermission();
          $tab->admin_id   = $RequestedAdmin->id;
          $tab->permission = json_encode($table);
          $tab->table      = $key;
          $tab->save();
        }//foreach
        return redirect()->route('admin.displayAdmins');

    }//create
    public function ShowDelete(){
      return view("Inbackground.admin.ShowDelete");
    }
    public function Delete($id){

      Admin::find($id)->delete();
      
     return redirect()->route('admin.displayAdmins');
    }//Delete
    
    public function ShowEdit(){
      return view('Inbackground.admin.ShowEdit');
    }//Show
    public function Edit($id){
      $Admin = Admin::find($id);
      return view('Inbackground.admin.Edit',compact('Admin'));
    }
   public function Update(Request $request){
      
    $Admin = Admin::find($request->id)->update($request->all());
    return redirect()->route('admin.displayAdmins');
   }
}
