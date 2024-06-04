<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HEM-G/A</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body, html {
      height: 100%;
      margin: 0; 
      padding: 0; 
    }
    .background {
      
      background-image: linear-gradient(to top, #000000, #1b000e, #25001f, #240036, #000653);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100%;
      color: white; 
      position: relative; 
    }

    
    .custom-btn {
      border: none;
      border-radius: 8px;
      width: 120px; 
      height: 35px; 
      transition: .3s;
      font-size: 14px; 
    }

    .custom-btn-primary {
      background-color: white;
      color: black;
    }

    .custom-btn-secondary {
      background-color: black;
      color: white;
    }

    
    .custom-btn-primary:hover {
      background-color: grey;
    }

    
    h1 {
      border: 2px solid white;
      border-radius: 10px;
      padding: 10px 20px;
      position: relative; 
    }

   
    p.mb-5 {
      font-size: 20px; 
    }

    
    .centered-image {
      position: absolute;
      top: 10px; 
      left: 50%; 
      transform: translateX(-50%); 
      width: 80px; 
      height: 80px; 
    }

    
    .container {
      margin-top: 20px; 
    }

    
    .custom-email-input {
      width: 300px; 
    }
  </style>
</head>
<body>
  
    @if (session()->has('error'))
      <div class="background">
      <div class="alert alert-danger">{{session('error')}}</di>
      </div>
    @endif

    
 <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #050050;">
    <div class="container">
      <!-- Logo -->
      <a lass="navbar-brand" href="{{route('bienvenue')}}">
        <img src="{{asset('assets/images/arrow.png')}}" alt="Logo" width="30" height="30" class="d-inline-block align-top me-2">
        
      </a>
      <!-- Navbar toggler for small screens -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar items -->
      
    </div>
  </nav>





  <div class="container-fluid d-flex justify-content-center align-items-center background">
    <div class="form-container">
      <img src="{{asset('assets/images/hem.png')}}" alt="Image" class="centered-image mt-4">
      <!-- Login form -->
      <form action="{{route('logingIn')}}" method="POST">
       @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input name="email" type="email" class="form-control custom-email-input" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
          <input type="radio" class="form-check-input" id="adminRadio" name="userType" value="admin">
          <label class="form-check-label" for="adminRadio">Admin</label>
        </div>
        <div class="mb-3 form-check">
          <input type="radio" class="form-check-input" id="professorRadio" name="userType" value="professor">
          <label class="form-check-label" for="professorRadio">Professor</label>
        </div>
        <button type="submit" class="btn btn-primary custom-btn-primary">Submit</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
