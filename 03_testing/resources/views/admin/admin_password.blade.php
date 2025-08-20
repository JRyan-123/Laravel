@extends('admin.index')

@section('title', 'Admin-Dashboard')

@section('content')
 <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success')}}
                                </div>
                            @endif
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                           
                            <div class="card-body row">
               
                               <div class=" ">
                                    <div class="border border-dark-subtle rounded p-3">



                                        <form action="{{ route('admin.update.password') }}" method="post" >
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                                <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" value="{{ old('old_password') }}">
                                               @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror


                                            </div>
                                             <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label"> New Password</label>
                                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" >
                                                @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                                <input type="password" name="new_password_confirmation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                               
                                            </div>
                                           
                                           

                                           


                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </main>

@endsection