@extends('layouts.base')

@section('title') Politique de confidentialité @endsection

@section('content')

    @include('includes.header')

    <main style="margin-top: -30px">

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 mx-auto text-center">
                        <h1 class="display-4">Politique de confidentialité</h1>
                        <!-- breadcrumb -->
                        <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-dots mb-0">
                            <li class="breadcrumb-item"><a href="/"><i class="bi bi-house me-1"></i> Accueil</a></li>
                            <li class="breadcrumb-item active">Politique de confidentialité</li>
                            </ol>
                        </nav>
                    </div>
                    {!! Adsense::show('responsive') !!}
                </div>
            </div>
        </section>
        <!-- =======================Inner intro END -->

        <!-- =======================About START -->
        <section class="pt-4 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        {!! Adsense::show('responsive') !!}
                        <h2>Politique de Confidentialité de Togo actualité</h2>

                        <h3 class="mt-4">
                            Chez TogoActualité, nous accordons une grande importance à la protection de vos données personnelles. Cette politique de confidentialité explique comment nous collectons, utilisons, stockons et protégeons vos informations lorsque vous utilisez notre site web. 
                        </h3> 
                        <h6>1. Collecte des informations</h6>
                        <p>Lorsque vous visitez notre Site, nous pouvons collecter différents types d'informations, notamment :</p>
                        <ul>
                            <li>Informations personnelles : telles que votre nom, adresse e-mail, numéro de téléphone, lorsque vous vous inscrivez à notre newsletter, remplissez un formulaire ou interagissez avec nos services.</li>
                            <li>Informations non personnelles : telles que les données sur votre navigation, l'adresse IP, le type de navigateur, les pages consultées, et les heures de visite. Ces données sont recueillies via des outils comme les cookies et Google Analytics.</li>
                             
                        </ul>
                        <h6>2. Utilisation des informations</h6>
                        <p>Nous utilisons les informations collectées pour :</p>
                        <ul>
                            <li>Améliorer l'expérience utilisateur sur notre Site.</li>
                            <li>Personnaliser le contenu que vous voyez en fonction de vos préférences.</li>
                            <li>Vous envoyer des mises à jour, newsletters ou autres communications si vous vous êtes abonné à ces services.</li>
                            <li>Analyser et comprendre l’utilisation du Site afin d'améliorer nos services.</li>
                            <li>Assurer la sécurité et la protection de notre Site.</li>
                        </ul>
                        <h6>3. Partage des informations</h6>
                        <p>Nous ne vendons, n’échangeons ni ne louons vos informations personnelles à des tiers. Cependant, nous pouvons partager vos informations dans les cas suivants :</p>
                        <ul>
                            <li>Fournisseurs de services tiers : Nous pouvons partager vos informations avec des partenaires ou prestataires de services (par exemple, pour l'hébergement, l'analyse du trafic ou l'envoi d'e-mails) uniquement dans le cadre de l’exécution de nos services.</li>
                            <li>Exigences légales : Nous pouvons divulguer vos informations si la loi nous l’exige ou si cela est nécessaire pour répondre à des demandes légales, protéger nos droits ou prévenir des activités illégales.</li>
                        </ul>
                        <h6>4. Cookies</h6>
                        <p>Notre Site utilise des cookies pour collecter des informations anonymes concernant votre navigation. Les cookies sont de petits fichiers texte stockés sur votre appareil par votre navigateur. Ils nous aident à :</p>
                        <ul>
                            <li>Analyser la performance et l’usage du Site.</li>
                            <li>Améliorer la navigation en mémorisant vos préférences.</li>
                            <li>Diffuser des publicités personnalisées via des services tels que Google AdSense.</li>
                        </ul>
                        <p>Vous pouvez désactiver les cookies via les paramètres de votre navigateur, mais cela peut affecter certaines fonctionnalités du Site.</p>
                        {!! Adsense::show('responsive') !!}
                        <h6>5. Sécurité des informations</h6>
                        <p>Nous mettons en œuvre des mesures de sécurité appropriées pour protéger vos informations contre l'accès, la divulgation ou la destruction non autorisés. Cependant, aucune méthode de transmission sur Internet ou de stockage électronique n'est totalement sécurisée, et nous ne pouvons garantir une sécurité absolue.</p>
                        <h6>6. Vos droits</h6>
                        <p>Vous avez le droit de :</p>
                        <ul>
                            <li>Accéder à vos informations personnelles : Vous pouvez demander une copie des informations que nous détenons à votre sujet.</li>
                            <li>Corriger vos informations : Vous pouvez corriger ou mettre à jour vos données personnelles à tout moment.</li>
                            <li>Supprimer vos informations : Vous pouvez demander la suppression de vos informations personnelles, sauf si la loi nous oblige à les conserver.</li>
                            <li>Vous désabonner : Vous pouvez vous désabonner de notre newsletter ou de tout autre service de communication en cliquant sur le lien de désinscription fourni dans nos e-mails.</li>
                        </ul>
                        <h6>7. Liens vers des sites tiers</h6>
                        <p>Notre Site peut contenir des liens vers des sites tiers. Nous ne sommes pas responsables des pratiques de confidentialité de ces sites. Nous vous encourageons à lire les politiques de confidentialité de chaque site que vous visitez.</p>
                        <h6>8. Modifications de la Politique de Confidentialité</h6>
                        <p>Nous nous réservons le droit de modifier cette politique de confidentialité à tout moment. Toute modification sera publiée sur cette page avec la date de mise à jour. Nous vous encourageons à consulter régulièrement cette page pour rester informé de la manière dont nous protégeons vos informations.</p>

                        <h6>9. Nous contacter</h6>
                        <p>Si vous avez des questions ou des préoccupations concernant cette politique de confidentialité, ou si vous souhaitez exercer vos droits, veuillez nous contacter à :</p>
                        <ul>
                            <li>Adresse : Lomé-Togo</li>
                            <li>E-mail : contact@togoactualite.com</li>
                            <li>Téléphone : <a href="tel:+330614305786" class="text-reset"><u> +33 06 14 30 57 86</u></a>, <a href="tel:+22899565788" class="text-reset"><u>+228 99 56 57 88</u></a></li>
                        </ul>
                        {!! Adsense::show('responsive') !!}
                    </div>  <!-- Col END -->
                </div>
            </div>
        </section>
 
    </main>

    @include('includes.footer')

@endsection
