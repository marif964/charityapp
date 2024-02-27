@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@endsection

@section('content')

<div class="container-fluid">

    
    <div class="row" style="margin-top: 5rem!important;">

        @foreach ($listings as $listing)
            @if($listing->ranked == 1)
            <div class="col-lg-6 col-md-12 home_left_img ok" style="background-image: url('{{ asset('images/'.$listing->fund_image)}}');">
                <h5 style="margin-top: 16rem;">{{$listing->fund_title}}</h5>
            <p class="title " style="margin-top: 10rem;">{{$listing->fund_url}}</p>
            <div class="layer"><a type="button" href="donation.php"
                    class="text-decoration-none text-center layer_btn" >DONATE</a>
            </div>
            @endif
        @endforeach
        
    </div>


        <!-- ---------------right image contaienr-------------- -->
        <div class="col-lg-6 col-md-12">

            <div class="row d-flex">

                @foreach ($listings as $listing)
                    @if ($listing->ranked == 2)
                    <div class="col-md-6 right1_img" style="background-image: url('{{ asset('images/'.$listing->fund_image)}}');">
                        <h5 style="margin-top: 6rem;">{{$listing->fund_title}}</h5>
                        <p>{{$listing->fund_url}}</p>
                        <div class="layer"><a type="button" href="donation.php"
                                class="text-decoration-none text-center layer_btn">DONATE</a></div>
                    </div>
                    @endif   
                    @if ($listing->ranked == 3)
                    <div class="col-md-6 right2_img" style="background-image: url('{{ asset('images/'.$listing->fund_image)}}');">
                        <h5 style="margin-top: 6rem;">{{$listing->fund_title}}</h5>
                        <p>{{$listing->fund_url}}</p>
                        <div class="layer"><a type="button" href="donation.php"
                                class="text-decoration-none text-center layer_btn">DONATE</a></div>
                    </div>
                    @endif   
                @endforeach
            </div>

            <div class="row">
                
                @foreach ($listings as $listing)
                    @if ($listing->ranked == 4)
                    <div class="col-md-6 right3_img" style="background-image: url('{{ asset('images/'.$listing->fund_image)}}');">
                        <h5 style="margin-top: 6rem;">{{$listing->fund_title}}</h5>
                        <p>{{$listing->fund_url}}</p>
                        <div class="layer"><a type="button" href="donation.php"
                                class="text-decoration-none text-center layer_btn">DONATE</a></div>
                    </div>
                    @endif   
                    @if ($listing->ranked == 5)
                    <div class="col-md-6 right4_img" style="background-image: url('{{ asset('images/'.$listing->fund_image)}}');">
                        <h5 style="margin-top: 6rem;">{{$listing->fund_title}}</h5>
                        <p>{{$listing->fund_url}}</p>
                        <div class="layer"><a type="button" href="#"
                                class="text-decoration-none text-center layer_btn">DONATE</a></div>
                    </div>
                    @endif   
                @endforeach

            </div>

        </div>
    </div>
</div>


<a href="{{ url('fundraiser') }}" class="btn btn-warning w-50 w-100 mt-1 text-light fw-bold fs-2x">Add Fundraiser Compaign Data</a>
<h6 class="my-3 text-center" style="color: #5b564c; font-size: 15px">EXPLORE PROJECTS:</h6>

<div class="explore_project">
    
    <a href="#">Flood Relief</a>
    <a href="#">Education</a>
    <a href="#">Hurricanes</a>
    <a href="#">Storms</a>
    <a href="#">Earthquake</a>
    <a href="#">Racial Justice</a>
    <a href="#">Child Protection</a>
    <a href="#">Food Security</a>
    <a href="#">Gender Equality</a>
    <a href="#">COVID-19</a>
    <a href="#">ALL PROJECTS</a>

</div>



@endsection