@extends('layouts.base')

@section('title') Vidéos @endsection

@section('content')

    @include('includes.header')

    <main style="margin-top: -30px; margin-bottom: -30px">
        <section class="position-relative">
            <div class="container" data-sticky-container>
                
                @include('adsense.google-ads.ads-sections-home-page')
                <div class="row">
                    <div class="col-lg-9">
                        <div class="mb-4">
                            <h1 class="display-4">Vidéos</h1>
                        </div>
                    </div>
                    
                </div>
                @include('adsense.google-ads.ads-sections-home-page')
            </div>
            
        </section>
    </main>

    @include('includes.footer')
    
@endsection