@extends('layouts.base')

@section('title') Accueil @endsection

@section('content')

    @include('includes.header')

    <main>
       
        <section class="position-relative container" style="margin-top: -45px; margin-bottom: -25px"> 
            @include('sectionHomePage.alaUne.alaUne')
            <!-- Annonce Google AdSense -->
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-5594963864359932"
                data-ad-slot="4473479121"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            @include('sectionHomePage.toutelActualite.toutelActualite') 
            <!-- Annonce Google AdSense -->
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-5594963864359932"
                data-ad-slot="4473479121"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </section>
 
    </main>
    @include('includes.footer')

@endsection
