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
      background-repeat: repeat-y;
      height: 100%;
      color: white; 
      position: relative; 
      display: flex;
      justify-content: center;
      min-height: 100vh;
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
    }

    .navbar-brand:hover {
      transform: translateY(-3px);
      transition: transform 0.3s ease;
    }

    .row {
      margin-left: auto;
      margin-right: auto;
      max-width: 960px;
    }

    .col-md-5 {
      max-width: calc(50% - 16px);
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

    .card:hover {
      transform: scale(1.02);
      transition: transform 0.3s ease;
    }

    /* Fixed Navbar */
    .fixed-top {
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      z-index: 1030; /* Ensure it overlays other content */
    }

    /* Adjust padding to ensure content starts below navbar */
    .content {
      padding-top: 60px; /* Adjust as needed based on navbar height */
    }

    /* Adjust margin to move cards down */
    .card-container {
      margin-top: 20px; /* Adjust as needed */
    }

    /* Adjust card width */
    .card {
      width: 180px; /* Adjust as needed */
    }

    /* Adjust font size */
    .card-title, .list-group-item {
      font-size: 14px; /* Adjust as needed */
    }

  
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #050050;">
  <div class="container">
    <a class="navbar-brand" href="{{route('admin.index' , $admin->id)}}">
      <img src="{{ asset('assets/images/hem.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-top me-2">
    </a>

    <a type="button" class="btn btn-primary" href="{{route('admin.createCalendar', $admin->id)}}">Ajouter Calendar</a>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-size: 18px;">
        <img src="{{ asset('assets/images/user.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-top me-2">
        {{$admin->prenom}} {{$admin->nom}}
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('admin.profile',$admin->id) }}">Voir Profil</a></li>
        <li><a class="dropdown-item" href="{{route('logout')}}" style="color: red;">Déconnecter</a></li>
      </ul>
    </li>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>


<div class="container-fluid background">
  <div class="d-flex flex-column content">
    @foreach ($calendars as $calendar)
     @if ($calendar->annee_section->filiere->id == $admin->filiere->id)
      <div class="card-container">
          <div class="card mb-3" style="width: auto;">
            <div class="card-body">
              <h5 class="card-title">{{$calendar->annee_section->annee}}/{{$calendar->annee_section->filiere->nom}}/{{$calendar->annee_section->filiere->campus->nom}}</h5>
              <div class="d-flex flex-wrap">
                @foreach ($calendar->days as $day)
                  <a href="{{ route('admin.editCalendarDay', ['admin' => $admin->id, 'calendar' => $calendar->id, 'day' => $day->id]) }}" class="card m-2" style="width: 150px; text-decoration: none;">
                    <div class="card-body">
                      <h6 class="card-title">{{$day->nom}}</h6>
                      <ul class="list-group">
                        @foreach ($day->modules as $module)
                          <li class="list-group-item" style="background-color: green; color: black; font-weight: bold;">{{$module->nom}}</li>
                        @endforeach
                      </ul>
                    </div>
                  </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
     @endif

    @endforeach
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
