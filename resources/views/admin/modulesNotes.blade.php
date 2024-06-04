<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HEM-G/A</title>
  <link rel="icon" href="{{ asset('assets/images/hem.png') }}" type="image/png">
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
      background-repeat:repeat-y;
      height: 100%;
      color: white; 
      position:relative; 
      display: flex;
      justify-content: center;
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
      width: 60px; 
      height: 60px; 
    }

    
    .container {
      margin-top: 20px; 
    }
    /* Optional: Add custom styling */
    .navbar-brand {
      font-size: 18px;
      /* Add ad
      ditional styles as needed */
    }
    .navbar-brand:hover {
      transform: translateY(-3px); /* Move the navbar item up by 3 pixels */
      transition: transform 0.3s ease; /* Add smooth transition */
    }
    .row {
  margin-left: auto;
  margin-right: auto;
  max-width: 960px; /* Adjust as needed */
}

.col-md-5 {
  max-width: calc(50% - 16px); /* Adjust for margin and padding */
}

.custom-card {
  background-color: #03002A;
  border: 2px solid white;
}

.custom-card .btn {
  background-color: #000656;
  color: #ffffff;
}

.custom-card .btn:hover {
  background-color: #ffffff;
  color: #050050;
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



<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #050050;">
  <div class="container">
    <!-- Left side of the navbar with logo -->
    <a class="navbar-brand" href="{{route('admin.index' , $admin->id)}}">
      <img src="{{ asset('assets/images/hem.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-top me-2">
    </a>

    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-size: 18px;">
            <img src="{{ asset('assets/images/user.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-top me-2">
            {{$admin->prenom}} {{$admin->nom}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('admin.profile',$admin->id) }}" >Voir Profil</a></li>
            <li><a class="dropdown-item" href="{{route('logout')}}" style="color: red;">Déconnecter</a></li>
          </ul>
    </li>

    <!-- Navbar toggler for small screens -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>


<div class="container-fluid d-flex justify-content-center align-items-center background">

    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col" style="text-decoration: underline;">Note</th>
            <th scope="col" style="text-decoration: underline;">Etudiant</th>
            <th scope="col" style="text-decoration: underline;">Module</th>
            <th scope="col" style="text-decoration: underline;">Date De Creation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
                @if ($note->module->annee_section->filiere->campus->id == $admin->filiere->campus->id)
                    <tr>
                        <th scope="row">{{$note->note}}</th>
                        <td>{{$note->etudiant->nom}}</td>
                        <td>{{$note->module->nom}} | {{$note->module->annee_section->annee}} | {{$note->module->annee_section->filiere->nom}}</td>
                        <td>{{$note->created_at}}</td>
                    </tr>
                @endif
            @endforeach
           
        </tbody>
    </table>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>
