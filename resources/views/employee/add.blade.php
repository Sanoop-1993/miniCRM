@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <a type="button"  href="{{route('employees')}}" class="btn btn-success float-right" >
Back        </a>

       


            <div class="card mt-4">
                <div class="card-header">{{ __('Add Employee') }}</div>

                <div class="card-body">

                    <form  action="{{ route('employees.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Firstname</label>
                            <input type="text" class="form-control"  name="firstName" id="exampleFormControlInput1" placeholder="Enter Firstname">
                        </div>
                        @error('firstName')
        
                        <div class="alert alert-danger">{{$message}}</div>
           
                        @enderror
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Lastname</label>
                            <input type="text" class="form-control" name="lastName"  id="exampleFormControlInput1" placeholder="Enter Lastname">
                        </div>
                        @error('lastName')
        
                        <div class="alert alert-danger">{{$message}}</div>
           
                        @enderror
        
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Company</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="company">
                                <option value="" >Select Company</option>

                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                                
                               
                              </select>
                            </select>
                        </div>
        
                      
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" class="form-control"  name="email" id="exampleFormControlInput1" placeholder="Enter Email">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Phone</label>
                            <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Enter Phonenumber">
                        </div>
                        <hr>
                        <div>
                            <button type="submit" class="btn btn-success ">Add Employee</button>
            
                        </div>
        
                       
                  
                    </div>
                   


                  
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
