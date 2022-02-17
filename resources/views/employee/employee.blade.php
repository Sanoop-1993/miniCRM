@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <a type="button" class="btn btn-success" href="{{route('employee.create')}}">
           Create new employees
        </a>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-1">
            <p>{{$message}}</p>
        </div>

            
        @endif

        


            <div class="card mt-4">
                <div class="card-header">{{ __('Employees List') }}</div>

                <div class="card-body">
                   


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $item)
                            <tr>
                                <td>{{$item->firstName}}</td>
                                <td>{{$item->lastName}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>

                                <td>
                                    <a href="{{URL::to('employees/edit/'.$item->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{URL::to('employees/delete/'.$item->id)}}"   onclick="return confirm('Are you sure want to delete?')"class="btn btn-danger">Delete</a>

                                </td>
                                </tr>
                                
                  
                            @endforeach
                                
                               
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $employees->links() }}
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>
@endsection
