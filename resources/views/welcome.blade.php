@extends('layouts.base')

@section('title') Accueil @endsection

@section('content')

    @include('includes.header')

    <main>

        <section class="position-relative" style="margin-top: -45px; margin-bottom: -25px">

            @include('adsense.google-ads.ads-sections-home-page-publications')

            @include('sectionHomePage.alaUne.alaUne')

            @include('adsense.google-ads.ads-sections-home-page-publications')

            @include('sectionHomePage.togoPolitique.togoPolitique')

            @include('adsense.google-ads.ads-sections-home-page-publications')

            @include('sectionHomePage.economie.economie')

            @include('adsense.google-ads.ads-sections-home-page-publications')

            @include('sectionHomePage.aNePasManquerTogo.aNePasManquerTogo')

            @include('adsense.google-ads.ads-sections-home-page-publications')

            @include('sectionHomePage.international.international') 

            @include('adsense.google-ads.ads-sections-home-page-publications')
            
            @include('sectionHomePage.societe.societe')

            @include('adsense.google-ads.ads-sections-home-page-publications')

            @include('sectionHomePage.opinionFaitsDivers.opinionFaitsDivers')

            @include('adsense.google-ads.ads-sections-home-page-publications')

            @include('sectionHomePage.important.important')

            @include('adsense.google-ads.ads-sections-home-page-publications')

            @include('sectionHomePage.toutelActualite.toutelActualite')

            @include('adsense.google-ads.ads-sections-home-page-publications')

        </section>
    </main>
    @include('includes.footer')

@endsection
