<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = Employee::get();

        $employees =  DB::table('employees')
        ->join('companies', 'employees.company', '=', 'companies.id')
        ->orderBy('employees.created_at', 'desc')
        ->select(['employees.*', 'companies.name'])
        ->paginate(10);
        
    

        return view('employee.employee',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();
        return view('employee.add',['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'firstName' => 'required',
            'lastName' => 'required'
            
        ]);

        $data = ['firstName' => $request->firstName,'lastName'=>$request->lastName, 'email' => $request->email, 'company' => $request->company, 'phone' => $request->phone];
        Employee::create($data);
        return redirect()->route('employees')->with('success','Employee Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::get();
        // $employee  = Employee::find($id);
        $employee  = Employee::join('companies', 'employees.company', '=', 'companies.id')->where('employees.id',$id)
        ->first(['employees.*', 'companies.name']);
        return view('employee.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee  = Employee::find($id);

        $data = ['firstName' => $request->firstName,'lastName'=>$request->lastName, 'email' => $request->email, 'company' => $request->company, 'phone' => $request->phone];
        $employee->update($data);
        return redirect()->route('employees')->with('success','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee  = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees')->with('success','Employee Deleted Successfully');

    }
}
