@extends('layouts.base')

@section('title') Accueil @endsection

@section('content')

    @include('includes.header')

    <main>

        <section class="position-relative" style="margin-top: -45px; margin-bottom: -25px">

            @include('sectionHomePage.alaUne.alaUne')

        </section>

        <div>
            <a href="#" class="card-img-flash d-block">
                <img src="/assets/images/adv-2.png" alt="adv">
            </a>
        </div>

        <div id="home_page"></div>

        <div>
            <a href="#" class="card-img-flash d-block">
                <img src="/assets/images/adv-2.png" alt="adv">
            </a>
        </div>

        <section class="position-relative" style="margin-top: -95px; margin-bottom: -25px">

            @include('sectionHomePage.toutelActualite.toutelActualite')

        </section>

        <div>
            <a href="#" class="card-img-flash d-block">
                <img src="/assets/images/adv-2.png" alt="adv">
            </a>
        </div>

    </main>
    @include('includes.footer')

@endsection
