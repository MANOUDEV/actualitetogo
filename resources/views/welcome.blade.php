@extends('layouts.base')

@section('title') Accueil @endsection

@section('content')

    @include('includes.header')

    <main>
       
        <section class="position-relative container" style="margin-top: -45px; margin-bottom: -25px"> 
            @include('sectionHomePage.alaUne.alaUne')
            <adsense-first></adsense-first>
            @include('sectionHomePage.toutelActualite.toutelActualite') 
        </section>
 
    </main>
    @include('includes.footer')

@endsection
