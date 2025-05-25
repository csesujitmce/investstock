<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      /* background-color: #426499; */
      background-color: #1995AD;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card {
      max-width: 400px;
      width: 100%;
      border-radius: 1rem;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }
    .form-label {
      font-weight: 500;
    }
    .card-header {
      margin-bottom: 1rem;
    }
    .small-text {
      font-size: 0.875rem;
    }
  </style>
</head>
<body>
  <div class="card p-4 bg-white">
    <div class="card-header text-center">
      <h4>Registration Form</h4>
    </div>
    
    <form action="{{ route('registerpost')}}" method="POST">
        @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Enter your name" value="{{old('name')}}" />         
        @error('name') 
            <span class="text-danger">{{$message}}</span> 
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}"/>
        @error('email') 
            <span class="text-danger">{{$message}}</span> 
        @enderror
      </div>
      <div class="mb-3">
        <label for="mobile" class="form-label">Mobile</label>
        <input type="tel" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" id="mobile" name="mobile" placeholder="Enter your mobile number" value="{{old('mobile')}}"/>
        @error('mobile') 
            <span class="text-danger">{{$message}}</span> 
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Enter password" />
        @error('password') 
            <span class="text-danger">{{$message}}</span> 
        @enderror
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password" />
        @error('password_confirmation') 
            <span class="text-danger">{{$message}}</span> 
        @enderror
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </form>
    <div class="text-center small-text mt-2">
      I have Login Details <a href="{{route('login')}}" class="text-decoration-none">. Login</a>
    </div>
  </div>




    <!-- Message Modal -->
  <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0">

        <!-- Modal Header -->
        <div class="modal-header bg-{{ session('message_type', 'info') }}">
          <h5 class="modal-title text-white" id="messageModalLabel">
            {{ ucfirst(session('header_message', 'Info')) }}
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          {{ session('message') }}
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
           <a href="{{route('login')}}" class="btn btn-primary">Login</a>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  @if(session('message'))
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          var msgModal = new bootstrap.Modal(document.getElementById('messageModal'));
          msgModal.show();
      });
  </script>
  @endif

  

  {{-- @php
    print_r($errors);
  @endphp --}}

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

