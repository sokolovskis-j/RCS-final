<!DOCTYPE html>
<html lang="en">
<head>
   @inlude('dashboard.layout.head')
</head>
<body class="bg-dark">
@include('dashboard.layout.navbar')
<div class="container ps-5 pe-5">
    <div class="row">
        <div class="col-12 p-2 text-left text-light mt-4">
            <h1 class="p-2">{{ $title }}</h1>

            <div class="p-2 mt-4 mb-4 border-bottom-white border-top-black">
                <button type="button" class="btn btn-sm btn-dark" onclick="">
                    New Action
                </button> 
            </div>
            
        </div>
    </div>
</div>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ mix('js/jquery.min.js') }}"></script>
</body>
</html>