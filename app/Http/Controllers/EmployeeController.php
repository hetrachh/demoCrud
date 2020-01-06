<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

//Model File
use App\Employee;

class EmployeeController extends Controller
{

    public function home()
    {
        $employee =  Employee::all();
        return response()->json($employee);
       // return view('home',['employee'=>$employee]);
    }
    public function add(Request $request)
    {
        $employees = new Employee;
        $employees->Name = $request->input('name');
        $employees->EmailId = $request->input('email');
        $employees->ContactNumber = $request->input('phno');
         $employees->save();

        return response()->json($employees);
        //return redirect('/')->with('info','Employee Saved!!');
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

        $e = Employee::where('id',$id)->update($data);
        return response()->json($e);
        //return redirect('/')->with('info','Employee Updated!!');
    }
    public function Delete_Data($id)
    {
        $e = Employee::where('id',$id)->delete();
        return response()->json($e);
        //return redirect('/')->with('info','Employee Removed!!');
    }
    public function getDataById($id)
    {
        // $e = Employee::find($id);
        $e = DB::table('employees')->where('id',$id)->get();

        if(count($e) > 0)
        {
            return response()->json($e,200);
        }
        else
        {
            return response()->json($e, 404);
        }
    }
}
