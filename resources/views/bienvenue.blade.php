<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HEM-G/A</title>
  <link rel="icon" href="{{asset('assets/images/hem.png')}}" type="image/png">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body, html {
      height: 100%;
      margin: 0; /* Remove default margin */
      padding: 0; /* Remove default padding */
    }
    .background {
      /* Specify background gradient */
      background-image: linear-gradient(to top, #000000, #1b000e, #25001f, #240036, #000653);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100%;
      color: white; /* Text color white */
      position: relative; /* Add position relative for positioning */
    }

    /* Custom button styles */
    .custom-btn {
      border: none;
      border-radius: 8px;
      width: 120px; /* Adjust width as needed */
      height: 35px; /* Adjust height as needed */
      transition: .3s;
      font-size: 14px; /* Adjust font size */
    }

    .custom-btn-primary {
      background-color: white;
      color: black;
    }

    .custom-btn-secondary {
      background-color: black;
      color: white;
    }

    /* Change background color on hover */
    .custom-btn-primary:hover {
      background-color: grey;
    }

    /* Style for h1 */
    h1 {
      border: 2px solid white;
      border-radius: 10px;
      padding: 10px 20px;
      position: relative; /* Add position relative for positioning */
    }

    /* Style for Bienvenue */
    p.mb-5 {
      font-size: 20px; /* Adjust font size */
    }

    /* Style for image */
    .centered-image {
      position: absolute;
      top: 10px; /* Adjust top position */
      left: 50%; /* Center horizontally */
      transform: translateX(-50%); /* Move back half of the image width */
      width: 80px; /* Adjust image width */
      height: 80px; /* Adjust image height */
    }

    /* Style for container */
    .container {
      margin-top: 20px; /* Add margin to the top */
    }
  </style>
</head>
<body>
    <div>
    @if (session()->has('success'))
   <div class="container-fluid d-flex justify-content-center align-items-center background">
     <div class="alert alert-success">{{session('success')}}</div>
   </div>
    @endif
    </div>
  <div class="container-fluid d-flex justify-content-center align-items-center background">
    <div class="text-center">
      <img src="{{asset('assets/images/hem.png')}}" alt="Image" class="centered-image mt-4">
      <h1 class="mb-4">Système Centralisé de Gestion des Absences</h1>
      <p class="mb-5">Bienvenue !🙌</p>
      <!-- Button container -->
      <div class="text-center mt">
        <a href="{{route('login.index')}}" class="btn btn-primary btn-lg custom-btn custom-btn-primary mb-3" type="button">Se connecter</a>
        <br>
        <p class="mb-3" style="font-size: 14px;">Si vous n'avez pas de compte, <a href="{{route('register.index')}}">cliquez ici pour vous inscrire</a>.</p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
