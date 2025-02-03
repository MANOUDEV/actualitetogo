<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="google-adsense-account" content="ca-pub-5594963864359932">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title') | Togo actualité</title>
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}
        <!-- Favicon -->
        <link rel="shortcut icon" href="/assets/images/Icone.png">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5594963864359932"
        crossorigin="anonymous"></script>
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Plugins CSS -->
        <link rel="stylesheet" type="text/css" href="/assets/vendor/font-awesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
        <!-- Theme CSS -->
        <link id="style-switch" rel="stylesheet" type="text/css" href="/assets/css/style.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       
    </head>
    <body>


        @yield('content')


        <!-- =======================JS libraries, plugins and custom scripts -->
        <!-- Bootstrap JS -->
        <script defer src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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

                    }
                });
            }

            askForPermission()

        </script>
        {{-- Public Key:
        BPQaQ_Te_Pz4AwpVdB8-PAGwSHFfL7Ui1QROzgbdslAqDq-EQ4bgapVGkKDgSEjjodwJCW2Ls8ypn_DxGoCW1HE

        Private Key:
        qwJ1mNZ2OUcBOUcNuE8Z3WdsSO2PRfpCiW32IeGgJGM --}}
    </body>
</html>
