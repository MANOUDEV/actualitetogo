@extends('layouts.base')

@section('title') Accueil @endsection

@section('content')

    @include('includes.header')

    <main>
       
        <section class="position-relative" style="margin-top: -45px; margin-bottom: -25px">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        {!! Adsense::show('responsive') !!}
                    </div>
                </div>
            </div>
            
            @include('sectionHomePage.alaUne.alaUne')

            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        {!! Adsense::show('responsive') !!}
                    </div>
                </div>
            </div>
           
            @include('sectionHomePage.toutelActualite.toutelActualite')

            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        {!! Adsense::show('responsive') !!}
                    </div>
                </div>
            </div>
        </section>
 
    </main>
    @include('includes.footer')

@endsection
