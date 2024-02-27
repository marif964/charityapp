@extends('layouts.sign-signup-app')

@section('title')
  <title>Fundraiser</title>
@endsection

@push('styles')
<style>
    label {
        font-weight: 700;
        font-size: .8rem;
    }

    .form {
        font-size: 1.5rem;
    }

    ::placeholder {
        font-size: .8rem;
    }
    label {
            font-weight: 700;
        }
</style>

@endpush


@section('content')
{{-- @auth --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fundraiser</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    </head>
    

    <body>
       

        <div class="card mt-4" style="width: 30rem; margin: auto; border-color: #b2bb1e">

            <form method="post" enctype="multipart/form-data">
                <div class="modal-body"
                    style="width: 30rem; border: 2px solid #b2bb1e; box-shadow: 0 0.5rem 0.6rem rgba(0, 0, 0, 0.4);">
                    <h2 class="mb-4 text-center text-decoration-underline" style="color: #b2bb1e;">Fundraiser Details</h2>


                    <div class=" gap-2" style="width: 100%">

                        <div class="mb-3">

                            <select name="catagory" class="form-select select-box py-2" aria-label="Default select example">
                                <option selected>Select Catagory</option>
                                <option>Food Security</option>
                                <option>Education</option>
                                <option>Child Protection</option>
                                <option>Gender Equality</option>
                                <option>Covid-19</option>
                                <option>Flood Relief</option>
                                <option>Earthquake</option>
                                <option>Storms</option>
                                <option>Racial Justice</option>
                                <option>Hurricanes</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Fundraiser Title</label>
                            <input type="text" class="form-control  form" id="loginemail" Required name="title"
                                aria-describedby="emailHelp" />
                        </div>


                        <div class="mb-3">
                            <label for="">User Name</label>
                            <input type="text" class="form-control  form" id="loginemail" Required name="name"
                                aria-describedby="emailHelp" />
                        </div>


                        <div class="mb-3">
                            <label for="">Fundraiser URL (Optional)</label>
                            <input type="text" class="form-control  form" id="loginpass" name="url" />
                        </div>

                        <div class="mb-3">
                            <label for="">Fundraiser Description</label>
                            <textarea cols="30" rows="1" name="desc" type="text" id="desc" class="form-control  form"
                                Required>
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="">Fundraiser Summary</label>
                            <textarea cols="30" rows="1" name="sum" type="text" id="desc" class="form-control  form"
                                Required>
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="">Fundraiser Challenge</label>
                            <textarea cols="30" rows="1" name="chal" type="text" id="desc" class="form-control  form"
                                Required>
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="">Fundraiser Solution</label>
                            <textarea cols="30" rows="1" name="sol" type="text" id="desc" class="form-control  form"
                                Required>
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="">How Your Donation Will Be Used</label>
                            <textarea cols="30" rows="1" name="donate" type="text" id="desc" class="form-control  form"
                                Required>
                            </textarea>
                        </div>


                        <div class="mb-3">
                            <label for="">Fundraiser Goal in $ (Optional)</label>
                            <input type="text" class="form-control form" id="loginpass" name="goal" />
                        </div>


                        <div class="mb-3">
                            <label for="">Fundraiser Image</label>
                            <label for="loginemail" class="form-label" style="width: 100%;">
                                <input type="file" class="form-control" id="loginemail" Required name="fund_image"
                                    aria-describedby="emailHelp" />

                        </div>


                        <button type="submit" name="submit" style="background-color: #b2bb1e; border: none"
                            class="btn btn-success w-100 d-flex justify-content-center mx-auto fw-bold">
                            SUBMIT
                        </button>

                    </div>
            </form>
        </div>
{{-- @else

        <div class="jumbotron bg-secondary container mt-5" style="padding: 5rem;">
            <h2 class="text-center text-light">Please Login to continue</h2>
            <a type="buttton" class=" btn d-flex justify-content-center text-light" style="font-size: .8rem; background-color: #b2bb1e;" href="/signin">Login</a>
        </div>

@endauth --}}

@endsection



