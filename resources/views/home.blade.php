@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <a type="button" class="btn btn-success" href="{{route('companies.create')}}">
           Create new companies
        </a>

        @if ($message = Session::get('success'))
        <div class="alert alert-success mt-1">
            <p>{{$message}}</p>
        </div>

            
        @endif

      


            <div class="card mt-4">
                <div class="card-header">{{ __('Companies List') }}</div>

                <div class="card-body">
                   


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Website</th>
                            <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                {{-- <td>{{$item->logo}}</td> --}}
                                <td>
                                    @if ($item->logo)
                                    <img src="{{ url('storage/images/'.$item->logo) }}" height="100px" width="100px" alt="">

                                    @else
                                        No Logo to Display
                                    @endif
                                </td>

                                <td>{{$item->website}}</td>
                                <td>
                                    <a href="{{URL::to('companies/edit/'.$item->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{URL::to('companies/delete/'.$item->id)}}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">Delete</a>

                                </td>
                                </tr>
                                
                  
                            @endforeach
                                
                               
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
