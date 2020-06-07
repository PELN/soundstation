@extends('layouts.master')
@section('title', 'About')

@section('content')

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title-page text-secondary">My account</h2>
    </div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->
    
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">
        <div class="row">
            <aside class="col-md-3">
                <ul class="list-group">
                    <a class="list-group-item active" href="#"> Account overview  </a>
                    <a class="list-group-item" href="#"> My Orders </a>
                    <a class="list-group-item" href="#"> My wishlist </a>
                    <a class="list-group-item" href="#"> Return and refunds </a>
                    <a class="list-group-item" href="#">Settings </a>
                </ul>
            </aside> <!-- col.// -->
            <main class="col-md-9">
        
                <article class="card mb-3">
                    <div class="card-body">
                        <figure class="icontext">
                            <div class="text">
                                <strong> {{ Auth::user()->name }} </strong> <br> 
                                {{ Auth::user()->email }} <br> 
                                <a href="#">Edit</a>
                            </div>
                        </figure>
                        <hr>
                        <article class="card-group">
                            <figure class="card bg">
                                <div class="p-3">
                                    <h5 class="card-title">38</h5>
                                    <span>Orders</span>
                                </div>
                            </figure>
                            <figure class="card bg">
                                <div class="p-3">
                                    <h5 class="card-title">5</h5>
                                    <span>Wishlists</span>
                                </div>
                            </figure>
                            <figure class="card bg">
                                <div class="p-3">
                                    <h5 class="card-title">12</h5>
                                    <span>Awaiting delivery</span>
                                </div>
                            </figure>
                        </article>
                    </div> <!-- card-body .// -->
                </article> <!-- card.// -->
        
                <article class="card  mb-3">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Recent orders </h5>	
                        <div class="row">
                            <div class="col-md-6">
                                <figure class="itemside  mb-3">
                                    <div class="aside"><img src="images/items/1.jpg" class="border img-sm"></div>
                                    <figcaption class="info">
                                        <time class="text-muted"><i class="fa fa-calendar-alt"></i> 12.09.2019</time>
                                        <p>Great item name goes here </p>
                                        <span class="text-warning">Pending</span>
                                    </figcaption>
                                </figure>
                            </div> <!-- col.// -->
                            <div class="col-md-6">
                                <figure class="itemside  mb-3">
                                    <div class="aside"><img src="images/items/2.jpg" class="border img-sm"></div>
                                    <figcaption class="info">
                                        <time class="text-muted"><i class="fa fa-calendar-alt"></i> 12.09.2019</time>
                                        <p>Machine for kitchen to blend </p>
                                        <span class="text-success">Departured</span>
                                    </figcaption>
                                </figure>
                            </div> <!-- col.// -->
                            <div class="col-md-6">
                                <figure class="itemside mb-3">
                                    <div class="aside"><img src="images/items/3.jpg" class="border img-sm"></div>
                                    <figcaption class="info">
                                        <time class="text-muted"><i class="fa fa-calendar-alt"></i> 12.09.2019</time>
                                        <p>Ladies bag original leather </p>
                                        <span class="text-success">Shipped  </span>
                                    </figcaption>
                                </figure>
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <a href="#" class="btn btn-outline-primary"> See all orders  </a>
                    </div> <!-- card-body .// -->
                </article> <!-- card.// -->
            </main> <!-- col.// -->
        </div>    
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection
