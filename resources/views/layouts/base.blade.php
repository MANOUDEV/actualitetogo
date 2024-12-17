<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title') | ActualiteTogo</title>
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}
        <!-- Favicon -->
        <link rel="shortcut icon" href="/assets/images/Icone.png">
        
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Plugins CSS -->
        <link rel="stylesheet" type="text/css" href="/assets/vendor/font-awesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="/assets/vendor/tiny-slider/tiny-slider.css">
        <!-- Theme CSS -->
        <link id="style-switch" rel="stylesheet" type="text/css" href="/assets/css/style.css">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5594963864359932" crossorigin="anonymous"></script>
    </head>
    <body>


        @yield('content')



        <!-- =======================
        Cookies alert START -->
        <div id="bloc" class="alert alert-dismissible fade show bg-dark text-white position-fixed start-0 bottom-0 z-index-99 shadow p-4 ms-3 mb-3 col-9 col-md-4 col-lg-4 col-xl-3" role="alert">
            Ce site Web garde des informations sur votre ordinateur. Pour en savoir plus sur ces informations que nous utilisons, consultez notre <a class="text-white" href="/privacy-policy"> Politique de confidentialité</a>
            <div class="mt-4">
                <button id="masquer" type="button" class="btn btn-success-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">Accepter</span>
                </button>
                <button id="masquer" type="button" class="btn btn-danger-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">Refuser</span>
                </button>
            </div>
            <div class="position-absolute end-0 top-0 mt-n3 me-n3"><img class="w-100" src="/assets/images/cookie.svg" alt="cookie"></div>
        </div>
        <!-- =======================JS libraries, plugins and custom scripts -->

        <!-- Bootstrap JS -->
        <script defer src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!-- Vendors -->
        <script defer src="/assets/vendor/tiny-slider/tiny-slider.js"></script>
        <script defer src="/assets/vendor/sticky-js/sticky.min.js"></script>

        <!-- Template Functions -->
        <script defer src="/assets/js/functions.js"></script>

        <script>
            navigator.serviceWorker.register("{{ URL::asset('service-worker.js') }}");

            function askForPermission() {
                Notification.requestPermission().then((permission) => {
                    if (permission === 'granted') {
                        // get service worker
                        navigator.serviceWorker.ready.then((sw) => {
                            // subscribe
                            sw.pushManager.subscribe({
                                userVisibleOnly: true,
                                applicationServerKey: "BFkgfzx0SjrHdtcwkpzdqbKWFnEmQe08sulnj3JdPLxxZtIwb0Sq8Iz-Os9s54MTATN6EkKKTNyoaujCMuKrlJU"
                            }).then((subscription) => {

                                saveSub(JSON.stringify(subscription));
                            });
                        });
                    }
                });
            }

            function saveSub(sub) {
                $.ajax({
                    type: 'post',
                    url: '{{ URL('/api/frontoffice/save-push-notification-sub') }}',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'sub': sub
                    },
                    success: function(data) {
                        // cosnole.log(sub)
                    }
                });
            }

            askForPermission()

            // Sélectionner les éléments HTML
            const bloc = document.getElementById('bloc');
            const bouton = document.getElementById('masquer');

            // Vérifier dans le stockage local si le bloc doit être caché
            if (localStorage.getItem('blocMasque') === 'true') {
            bloc.style.display = 'none';
            }

            // Ajouter un événement de clic sur le bouton
            bouton.addEventListener('click', () => {
            // Cacher le bloc
            bloc.style.display = 'none';
            // Sauvegarder l'état dans le stockage local
            localStorage.setItem('blocMasque', 'true');
            });

        </script>
        {{-- Public Key:
        BPQaQ_Te_Pz4AwpVdB8-PAGwSHFfL7Ui1QROzgbdslAqDq-EQ4bgapVGkKDgSEjjodwJCW2Ls8ypn_DxGoCW1HE

        Private Key:
        qwJ1mNZ2OUcBOUcNuE8Z3WdsSO2PRfpCiW32IeGgJGM --}}


    </body>
</html>
