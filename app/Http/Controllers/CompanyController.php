<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest();
        return view('home',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.add');

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

            'name' => 'required',
            'logo' => ['image','mimes:jpg,png,jpeg,gif','dimensions:min_width=100,min_height=100']
            
        ]);

        $image = $request->file('logo');
        if($image)
        {
            $fileName = date('dmy_H_s_i') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $fileName);
            $data = ['name' => $request->name, 'email' => $request->email, 'website' => $request->website, 'logo' => $fileName];
            Company::create($data);
            return redirect()->route('home')->with('success','Company Created Successfully');

        }else{
            $data = ['name' => $request->name, 'email' => $request->email, 'website' => $request->website];
            Company::create($data);
            return redirect()->route('home')->with('success','Company Created Successfully');

        }


	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company  = Company::find($id);
        return view('company.edit',compact('company'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->all();
        $company  = Company::find($id);
        $oldLogo = $request->old_logo;
        $image = $request->logo;
        if($image)
        {
            if($oldLogo)
            {
                unlink($oldLogo);
            }
            $fileName = date('dmy_H_s_i') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $fileName);
            $data = ['name' => $request->name, 'email' => $request->email, 'website' => $request->website, 'logo' => $fileName];
            $company->update($data);

            return redirect()->route('home')->with('success','Company Updated Successfully');

        }else{
            $data = ['name' => $request->name, 'email' => $request->email, 'website' => $request->website];
            $company->update($data);
            return redirect()->route('home')->with('success','Company Updated Successfully');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company  = Company::find($id);
        $image = 'storage/images/'.$company->logo;
        if($company->logo)
        {
            unlink($image);
            $company->delete();
            return redirect()->route('home')->with('success','Company Deleted Successfully');
        }
        else{
            $company->delete();
            return redirect()->route('home')->with('success','Company Deleted Successfully');
        }
       

    }
}
