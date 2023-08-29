<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    {{-- navbar start --}}
<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="{{url('/')}}">NoteBook <i class="fa-solid fa-house"></i></a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            @auth
            <li class="nav-item">
                <a class="nav-link active" href="{{route('data')}}" aria-current="page">User Data <i class="fa-solid fa-database"></i> <span class="visually-hidden">(current)</span></a>
            </li>
            @endauth
          
            @guest
            <li class="nav-item">
                <a class="nav-link active" href="{{url('register')}}" aria-current="page">Register <i class="fa-solid fa-registered"></i><span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{url('login')}}" aria-current="page">Login <i class="fa-solid fa-right-to-bracket"></i><span class="visually-hidden">(current)</span></a>
            </li>
            @endguest
            @auth
            <li class="nav-item">
                <a class="nav-link active" href="#" aria-current="page">{{auth()->user()->name}}<i class="fa-solid fa-user"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout <i class="fa-solid fa-right-from-bracket"></i> <span class="visually-hidden">(current)</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
           
            <li class="nav-item">
                <a class="nav-link active" href="{{url('data')}}" aria-current="page">Reset <i class="fa-solid fa-window-restore"></i><span class="visually-hidden">(current)</span></a>
            </li>
          
           
        </ul>
        {{-- navbar end --}}
        {{-- search --}}
        <form action= "{{url('/data')}}" method="get" class="d-flex my-2 my-lg-0">
            <input class="form-control me-sm-2" type="text"name="search" value="{{isset($search)?$search:''}}" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        {{-- search end --}}
    </div>
    @endauth
</nav>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
</body>

</html>