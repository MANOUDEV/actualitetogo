@extends('layouts.base')

@section('title') Accueil @endsection

@section('content')

    @include('includes.header')

    <main>

        <section class="position-relative" class="position-relative" style="margin-top: -45px; margin-bottom: -25px">

            @include('adsense.google-ads.ads-sections-home-page')

            @include('sectionHomePage.alaUne.alaUne')

            @include('adsense.google-ads.ads-sections-home-page')

            @include('sectionHomePage.toutelActualite.toutelActualite')

            @include('adsense.google-ads.ads-sections-home-page')
        </section>
    </main>
    @include('includes.footer')

@endsection
