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
                                <div class="col-lg-4 ">
                                    <div class="border border-dark-subtle rounded p-3">
                                        <h1>Welcome, {{ $user->name }}</h1>
                                        <p>Your email: {{ $user->email }}</p>
                                        <p>Your phone: {{ $user->phone }}</p>
                                        <div>
                                            <img class="w-25 h-auto" src="" alt="">
                                        </div>
                                    </div>
                                </div>
                               <div class="col-lg-8 ">
                                    <div class="border border-dark-subtle rounded p-3">



                                        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <input type="email" name="newEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->email }}">
                                               
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                                <input type="text" name="newName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->name }}">
                                               
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">phone</label>
                                                <input type="tel" name="newPhone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->phone }}">
                                               
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">photo</label>
                                                <input type="file" name="newPhoto" class="form-control" id="pickImage" aria-describedby="emailHelp" >
                                               
                                            </div>
                                            <div class="mb-3">
                                                <img src="{{ (!empty($user->photo)) ? url('imgs/'.$user->photo) : url('imgs/nopic.png') }}" alt="" id="showImage" class="w-25 h-auto">
                                               
                                            </div>


                                           


                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </main>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const pickImg = document.getElementById('pickImage');
                        const showImg = document.getElementById('showImage');

                        pickImg.addEventListener('change', function(e) {
                            const fileReader = new FileReader();
                            fileReader.onload = function(event) {
                                showImg.src = event.target.result;
                            };
                            fileReader.readAsDataURL(e.target.files[0])


                        });
                    });
                </script>
@endsection