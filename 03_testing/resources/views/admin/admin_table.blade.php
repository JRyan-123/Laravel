@extends('admin.index')

@section('title', 'Accounts')

@section('content')

	<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body" id="userDetail">
                               
                                
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>phone</th>
                                            <th>email</th>
                                            <th>phoyo</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                  	<tbody>
                                  		@foreach($otherUsers as $otherUser)
                                  		<tr>
                                            <td>{{ $otherUser->name }}</td>
                                            <td>{{ $otherUser->phone }}</td>
                                            <td>{{ $otherUser->email }}</td>
                                            <td>{{ $otherUser->photo }}</td>
                                            <td><button class="viewBtn btn btn-primary" data-id="{{ $otherUser->id }}">View {{$otherUser->id}}</button></td>

                                        </tr>
                                        @endforeach
                                  	</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- User Details Modal -->
                <div class="modal fade" tabindex="-1" id="userModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <p><strong>Name:</strong> <span id="modalUserName"></span></p>
                        <p><strong>Phone:</strong> <span id="modalUserPhone"></span></p>
                        <p><strong>Email:</strong> <span id="modalUserEmail"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('/js/user-details.js')}}"></script>

@endsection