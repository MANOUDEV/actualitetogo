@extends('layouts.base')

@section('title') Accueil @endsection

@section('content')

    @include('includes.header')

    <main>
       
        <section class="position-relative" style="margin-top: -45px; margin-bottom: -25px">
            {!! Adsense::show('responsive') !!}
            @include('sectionHomePage.alaUne.alaUne')
            {!! Adsense::show('responsive') !!}
        </section>
        
        <section class="position-relative" style="margin-top: -95px; margin-bottom: -25px">
            {!! Adsense::show('responsive') !!}
            @include('sectionHomePage.toutelActualite.toutelActualite')
            {!! Adsense::show('responsive') !!}
        </section>
 
    </main>
    @include('includes.footer')

@endsection
