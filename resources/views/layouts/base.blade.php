<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title') | Togo actualité</title>

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

<style>
    .input-btn {
        width: 100%;
        height: 50px;
        border: 1px solid #ccc;
        border-radius: 5px;
        display: flex;
        overflow: hidden;
      }

      .input-img {
        position: relative;
        width: 80%;
        height: 100%;
      }

      .input-img input {
        width: 100%;
        height: 100%;
        outline: none;
        border: none;
        background: none;
        font-size: 25px;
        padding: 0 20px;
        font-family: "Ga Maamli";
      }

      .input-img img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.6;
      }

      .refresh-btn {
        width: 20%;
        height: 100%;
        border: none;
        background: #4070f4;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        transition: 0.3s;
      }

      .refresh-btn:hover {
        opacity: 0.9;
      }
      .captcha-text{
        color: #000;
        font-weight:bold;
        font-style: italic;
      }
    </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body id="app">


        @yield('content')

        <!-- Bootstrap JS -->
        <script defer src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!-- Vendors -->
        <script defer src="/assets/vendor/tiny-slider/tiny-slider.js"></script>
        <script defer src="/assets/vendor/sticky-js/sticky.min.js"></script>

        <!-- Template Functions -->
        <script defer src="/assets/js/functions.js"></script>
    </body>
</html>
