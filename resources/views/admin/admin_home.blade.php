@extends('admin.layouts.master')
@section('title', 'Admin')

@section('content')

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title-page text-secondary">Admin Dashboard</h2>
    </div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->
    
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">
        <div class="row">
            <aside class="col-md-3">
                <ul class="list-group">
                    <a class="list-group-item active" href="#"> Products </a>
                    <a class="list-group-item" href="#"> Orders </a>
                    <a class="list-group-item" href="#"> Returns </a>
                    <a class="list-group-item" href="#"> Mail list </a>
                    <a class="list-group-item" href="#"> Settings </a>
                </ul>
            </aside> <!-- col.// -->
            <main class="col-md-9">
                <article class="card  mb-3">
                    <div class="card-body">
                        <h5 class="card-title mb-4"> Product management</h5>	
                        <div class="row">
                        
                            {{-- content --}}

                        </div> <!-- row.// -->
                    </div> <!-- card-body .// -->
                </article> <!-- card.// -->
            </main> <!-- col.// -->
        </div>    
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection