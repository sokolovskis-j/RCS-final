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
        <div class="container">
            <div class="row justify-content-center p-3">
                <!-- ALL STYLES MUST BE transfered TO /resources/css folder
                !!! "npm run dev" must be run every time changes are made to css files in order to compile them !!! -->
                <div class="col-12">
                    <h1 class="text-light text-center">Welcome Back!</h1>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-5 text-center">
                    <form name="login" class="mt-2">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-12">
                                <div id="formErrors" class="alert alert-danger text-start" role="alert" style="display:none;">
                                    <ul class="m-0">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label style="color:white">Email</label>
                                    <input id="email" type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label style="color:white">Password</label>
                                    <input id="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <button id="signInButton" type="button" class="btn btn-light font-weight-bolder w-100">
                                    Sign In
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ mix('js/jquery.min.js') }}"></script>
    <script>
        let loginSubmitted = false;

        function clearErrors() {
            $("#formErrors ul").empty();
            $("#formErrors").hide();
        }

        function addErrors(errorArray) {
            if (Array.isArray(errorArray) && errorArray.length > 0) {
                for (let i = 0; i < errorArray.length; i++){
                    $("#formErrors ul").append("<li>" + errorArray[i] + "</li>");
                }

                $("#formErrors").show();
            }
        }

        function formatErrors(errorArray) {
            let errorsList = [];

            for (var key in errorArray) {
                if (errorArray.hasOwnProperty(key)) {
                    errorsList.push(errorArray[key]);
                }
            }

            return errorsList;
        }


        $(document).ready(function() {
            $("#signInButton").click(function (e) {
                e.preventDefault();

                clearErrors();

                if (loginSubmitted !== true) {
                    loginSubmitted = true;

                    $.post ({
                        "url": "/api/login",
                        "data": { 
                            "_token": "{{ csrf_token() }}",
                            "email": $("#email").val(),
                            "password": $("#password").val()
                        },
                        success: function(response) {
                            loginSubmitted = false;
                            window.location.href = "/dashboard";
                        },
                        error: function(response) {
                            loginSubmitted = false;


                            if(response.status == 422) {
                                addErrors(formatErrors(response.responseJSON.errors));
                            } else {
                                addErrors(["Unable to process your request."]);
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

