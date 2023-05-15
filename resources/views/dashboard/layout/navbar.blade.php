<div class="row g-0">
        <div class="col-12 g-0 p-2 ps-4 pe-4 m-0" >
            <div class="navbar navbar-expand-lg navbar-light mt-2 mb-2 p-0">
                <div class="container-fluid p-0">
                    <a class="navbar-brand" href="/" style="color:white;"><b>Blog</b></a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Images</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('dashboard/users') }}">Users</a>
                        </li>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth:user()->name }}
                            </a>
                            <ul class="dropdown-menu" airia-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-center text-light" onclick="event.preventDefault()" id="logoutButton">Logout</a>
                                </li>   
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div> 
    <div class="row g-0">
        <div class="col-12 text-center g-0" style="background:transparent;border-bottom:1px solid white;border-top:1px solid white;">
            <img src="laravel-project-headerimg.jpg" style="max-width:100%" title="My Blog header image">
        </div>
    </div>
</div>