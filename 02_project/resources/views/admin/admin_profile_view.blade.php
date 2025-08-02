@extends('admin.admin_dashboard')
@section('admin')
		<div class="page-content">

     
        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
              	 
                <div class="d-flex align-items-center justify-content-between mb-2">

               
                  <div>
                    <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                    <span class="h4 ms-3">{{ $profileData->username }}</span>
                  </div>
                
                </div>
               
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                  <p class="text-muted">{{ $profileData->name }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                  <p class="text-muted">{{ $profileData->address }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                  <p class="text-muted">{{ $profileData->email }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Contact:</label>
                  <p class="text-muted">{{ $profileData->phone }}</p>
                </div>
                <div class="mt-3 d-flex social-links">
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="github"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="twitter"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="instagram"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">

					<h6 class="card-title">UPDATE ADMIN PROFILE</h6>

					<form class="forms-sample" action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" name="name" id="name" autocomplete="off" value="{{ $profileData->name }}">
						</div>
						<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<input type="text" class="form-control" name="username" id="username" autocomplete="off" value="{{ $profileData->username }}">
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" name="email" id="email" autocomplete="off" value="{{ $profileData->email }}">
						</div>
						<div class="mb-3">
							<label for="phone" class="form-label">Phone</label>
							<input type="tel" class="form-control" name="phone" id="phone" autocomplete="off" value="{{ $profileData->phone }}">
						</div>
						<div class="mb-3">
							<label for="address" class="form-label">Address</label>
							<input type="text" class="form-control" name="address" id="address" autocomplete="off" value="{{ $profileData->address }}">
						</div>
						
						<div class="mb-3">
							<label for="image" class="form-label">Photo</label>
							<input type="file" class="form-control" name="photo" id="image" autocomplete="off" placeholder="Password">
						</div>
						<div class="mb-3">
		                    <img class="wd-80 rounded-circle" id="showImage" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
		                    
	                  	</div>
	                  	
						<button type="submit" class="btn btn-primary me-2">Save changes</button>
						
						
					</form>

              </div>
            </div>             

            </div>
          </div>
        </div>

	</div>
             <script>
				document.addEventListener('DOMContentLoaded', function () {
				    const imageInput = document.getElementById('image');
				    const showImage = document.getElementById('showImage');

				    imageInput.addEventListener('change', function (e) {
				        const reader = new FileReader();
				        reader.onload = function (event) {
				            showImage.src = event.target.result;
				        };
				        reader.readAsDataURL(e.target.files[0]);
				    });
				});
			</script>
@endsection