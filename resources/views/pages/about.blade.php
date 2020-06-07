@extends('layouts.master')
@section('title', 'About')
@section('content')
<section class="section-content padding-y">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <h2 class="title text-grey mb-4">About us</h2>
                <p>Welcome to Sound Station. Since our establishment in 1991, three keywords have always characterized our store: depth, variety & interest. We carry any genre from mainstream pop to musique concrete and electronica, from rockabilly, vocal pop, 60'ies garage & psyche, metal, punk and all their revival forms to rural blues, soul, jazz & rare grooves. </p>
                <p>Sound Station is one of Scandinavia's best-stocked record stores. We carry a wide range of music to satisfy even the most discriminating listener. You will find a small but growing sample of rare vinyl & CDs, collectibles, memorabilia, posters etc. on our online store. Please visit us if you are in the area and browse through the large selection of inexpensive used CD, LP & DVDs. Sound Station also has one of the largest selections of new vinyl releases in Scandinavia. Feel free to check it out. </p>
                <p>Sound Station buys and sells thousands of records and CDs every week. You are welcome to email us any question regarding items not listed in our catalogue, your wantlist or if you have goods to offer us.</p>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5">
                <img class="img-md ml-3 mt-3" src="{{ asset('storage/assets/about1.jpg') }}">
                <img class="img-md ml-3 mt-3" src="{{ asset('storage/assets/about2.jpg') }}">
                <img class="img-md ml-3 mt-3" src="{{ asset('storage/assets/about3.jpg') }}">
                <img class="img-md ml-3 mt-3" src="{{ asset('storage/assets/about4.jpg') }}">
            </div>
        </div>
    </div>
</section>
@endsection
