@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <a type="button"  href="{{route('home')}}" class="btn btn-dark float-right" >
Back        </a>

       


            <div class="card mt-4">
                <div class="card-header">{{ __('Add Company') }}</div>

                <div class="card-body">

                    <form  action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text"  name="name" class="form-control" id="exampleFormControlInput1" placeholder="Company Name">
                        </div>
                        @error('name')

                        <div class="alert alert-danger">{{$message}}</div>
           
                        @enderror
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email"  name="email" class="form-control" id="exampleFormControlInput1" placeholder="Company Email">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Website</label>
                            <input type="text"  name="website" class="form-control" id="exampleFormControlInput1" placeholder="Company Website">
                        </div>
        
                        
        
                        <div class="form-group">
                             <label for="exampleFormControlFile1">Logo</label>
                             <input type="file"  name="logo" class="form-control" id="exampleFormControlFile1">
                        </div>

                        @error('logo')

                        <div class="alert alert-danger">{{$message}}</div>
           
                        @enderror
        
                     
                   
                    </div>
        <hr>
                    <!-- Modal footer -->
                    <div>
                        <button type="submit" class="btn btn-success" >Add Company</button>
        
                    </div>
        
                       
                  
                    </div>
                   


                  
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
