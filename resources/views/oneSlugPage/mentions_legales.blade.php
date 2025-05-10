@extends('layouts.base')

@section('title') Mentions Légales @endsection

@section('content')

    @include('includes.header')

    <main style="margin-top: -30px">

        <section>
            <div class="container">

                <div class="row">
                    <div class="col-md-9 mx-auto text-center">
                        
                        @include('adsense.google-ads.ads-sections-home-page')
                        <h1 class="display-4">Mentions légales</h1>
                        <!-- breadcrumb -->
                        <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-dots mb-0">
                            <li class="breadcrumb-item"><a href="/"><i class="bi bi-house me-1"></i> Accueil</a></li>
                            <li class="breadcrumb-item active">Mentions légales</li>
                            </ol>
                        </nav>
                        @include('adsense.google-ads.ads-sections-home-page')
                    </div>

                </div>
            </div>
        </section>
        <!-- =======================Inner intro END -->

        <!-- =======================About START -->
        <section class="pt-4 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        @include('adsense.google-ads.ads-sections-home-page')
                        <h2>Mentions légales</h2>
 
                        <h6>Éditeur du site :</h6>
                        <ul>
                            <li>Site: Togo actulité</li>
                            <li>Adresse : Lomé-Togo</li>
                            <li>E-mail : contact@togoactualite.com</li>
                            <li>Téléphone : <a href="tel:+330614305786" class="text-reset"><u> +33 06 14 30 57 86</u></a>, <a href="tel:+22899565788" class="text-reset"><u>+228 99 56 57 88</u></a></li>
                        </ul>
                        <h6>Propriété intellectuelle :</h6>
                        <p>Le contenu (textes, images, vidéos, etc.) publié sur le site togoactualité.com est la propriété exclusive de Togo actualité ou des détenteurs des droits concernés. Toute reproduction, distribution, modification, adaptation, retransmission ou publication de ces éléments est strictement interdite sans l'accord exprès par écrit de Togo actualité.</p>
                         
                    </div>  <!-- Col END -->
                </div>
                @include('adsense.google-ads.ads-sections-home-page')
            </div>
        </section>
 
    </main>

    @include('includes.footer')

@endsection
