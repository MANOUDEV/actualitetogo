@extends('layouts.base')

@section('title') Accueil @endsection

@section('content')

    @include('includes.header')

    <main>
       
        <section class="position-relative" style="margin-top: -45px; margin-bottom: -25px">
            <div class="container">
                {!! Adsense::show('responsive') !!}    
            </div>
            
            @include('sectionHomePage.alaUne.alaUne')

            <div class="container">
                {!! Adsense::show('responsive') !!}    
            </div>
           
            @include('sectionHomePage.toutelActualite.toutelActualite')

            <div class="container">
                {!! Adsense::show('responsive') !!}    
            </div>
        </section>
 
    </main>
    @include('includes.footer')

@endsection
