<!-- Gala MD:

 - register/login
 - create/post new "insert creativity"
 - profile - view all of your created things (can only see if you own profile)
 - dashboard - view all created things (can be viewed by guest)

- DB (atleast 2 tables, users + thing) 

Bonus:
can view other user profiles based on link user/1, user/5
can delete "thing" if you own profile
can update "thing"
must verify email, before posting
option to reset password

-->


<!DOCTYPE html>
<html lang="en">
<head>
   @include("layout.head")
</head>
<body class="bg-dark">
    @include("layout.navbar")
        <div class="container ps-5 pe-5">
            <div class="row">
                <!-- ALL STYLES MUST BE transfered TO /resources/css folder
                !!! "npm run dev" must be run every time changes are made to css files in order to compile them !!! -->
                <div class="col-12 p-2 text-center mt-4 mb-4" style="border-bottom:1px solid white;">
                    <h1 class="fw-bolder fs-1" style="color:white">Welcome to my blog</h1>
                    <p style="color:white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque minima placeat culpa magnam eos suscipit veritatis inventore. Perspiciatis incidunt quis magni laborum hic. Autem impedit, numquam aspernatur facere illum accusamus.<p>
                </div>
            </div>
            <div class="row">
                @include("home.blog")
                <div class="col-lg-1 col-0">
                </div>
                <div class="col-lg-3 col-12 mt-5 ps-lg-4">
                    <div clas="row">
                        @include("home.trending")
                        @include("home.recent")
                        @include("home.tags")
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 g-0 mt-2">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item @if($page_number === 1) disabled @endif">
                                <a class="page-link" href="/page={{ $page_number - 1}}">
                                    Previous
                                </a>
                            </li>
                            @for ($i = 0; $i < ceil($total_blogs / $page_length); $i++)
                            <li class="page-item @if($page_number === $i + 1) active @endif">
                                <a class="page-link" href="/?page={{ $i + 1 }}">{{ $i + 1 }}</a>
                            </li>
                            @endfor
                            <li class="page-item @if($page_number >= ceil($total_blogs / $page_length)) disabled @endif">
                                <a class="page-link" href="/?page={{ $page_number + 1}}">
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    <script src="{{ mix('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- FIX -->
    <!-- !!! ERROR redirectTO is not defined, not returning home when onClick blog post -->
    <!-- FIX -->
</body>
</html>