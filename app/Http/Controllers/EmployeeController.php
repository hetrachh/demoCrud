<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Model File
use App\Employee;

class EmployeeController extends Controller
{

    public function home()
    {
        $employee =  Employee::all();

        return view('home',['employee'=>$employee]);
    }
    public function add(Request $request)
    {
        $employees = new Employee;
        $employees->Name = $request->input('name');
        $employees->EmailId = $request->input('email');
        $employees->ContactNumber = $request->input('phno');
        $employees->save();
        
        return redirect('/')->with('info','Employee Saved!!');
    }
    public function update($id)
    {   
        $Employee = Employee::find($id);
     
        return view('update',['Employee'=>$Employee ]);
    }
    public function edit(request $request,$id)
    {
        $data = array(
            'EmailId' => $request->input('email'),
            'ContactNumber' => $request->input('phno')
        );
        
        Employee::where('id',$id)->update($data);

        return redirect('/')->with('info','Employee Updated!!');
    }
    public function Delete_Data($id)
    {
        Employee::where('id',$id)->delete();

        return redirect('/')->with('info','Employee Removed!!');
    }
}
