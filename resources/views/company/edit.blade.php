@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <a type="button"  href="{{route('home')}}" class="btn btn-dark float-right" >
Back        </a>

       


            <div class="card mt-4">
                <div class="card-header">{{ __('Edit Company') }}</div>

                <div class="card-body">

                    <form  action="{{ url('companies/update/'.$company->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text"  name="name" class="form-control" id="exampleFormControlInput1" value="{{$company->name}}" placeholder="Company Name">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email"  name="email" class="form-control" id="exampleFormControlInput1" value="{{$company->email}}" placeholder="Company Email">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Website</label>
                            <input type="text"  name="website" class="form-control" id="exampleFormControlInput1"  value="{{$company->website}}" placeholder="Company Website">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Logo</label>
                            <input type="file"  name="logo" class="form-control" id="exampleFormControlFile1">
    
                            {{-- <img src="{{ url('storage/images/'.$company->logo) }}" height="100px" width="100px" alt=""> --}}
    
                       </div>
            
                        
        
                    @if ($company->logo)
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Current Logo</label>
                        <input type="hidden"  name="old_logo" class="form-control" id="exampleFormControlFile1" value="{{$company->logo}}">

                        <img src="{{ url('storage/images/'.$company->logo) }}" height="100px" width="100px" alt="">

                   </div>
                    @else
                        
                    @endif

                       

                  
                     
                   
                    </div>
        <hr>
                    <!-- Modal footer -->
                    <div>
                        <button type="submit" class="btn btn-success" >Update Company</button>
        
                    </div>
        
                       
                  
                    </div>
                   


                  
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
