@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <a type="button"  href="{{route('employees')}}" class="btn btn-dark float-right" >
Back        </a>

       


            <div class="card mt-4">
                <div class="card-header">{{ __('Edit Employee') }}</div>

                <div class="card-body">

                    <form  action="{{ url('employees/update/'.$employee->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Firstname</label>
                            <input type="text" class="form-control"  name="firstName" id="exampleFormControlInput1" value="{{$employee->firstName}}" placeholder="Enter Firstname">
                        </div>
                        @error('firstName')
        
                        <div class="alert alert-danger">{{$message}}</div>
           
                        @enderror
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Lastname</label>
                            <input type="text" class="form-control" name="lastName"  id="exampleFormControlInput1" placeholder="Enter Lastname" value="{{$employee->lastName}}">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Company</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="company" value="{{$employee->lastName}}">
                                <option value="{{$employee->company}}" >{{$employee->name}}</option>

                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
        
                      
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" class="form-control"  name="email" id="exampleFormControlInput1" placeholder="Enter Email" value="{{$employee->email}}">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Phone</label>
                            <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Enter Phonenumber" value="{{$employee->phone}}">
                        </div>
                        <hr>
                        <div>
                            <button type="submit" class="btn btn-success ">Update Employee</button>
            
                        </div>
        
                       
                  
                    </div>
                   


                  
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
