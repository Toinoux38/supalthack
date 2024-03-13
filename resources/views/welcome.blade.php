<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SupMana</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>
<body class="is-boxed has-animations antialiased">
<div class="body-wrap">
    <header class="site-header">
        <div class="container">
            <div class="site-header-inner">
                <div class="brand header-brand">
                    <h1 class="m-0">
                        <a href="#">
                            <img class="header-logo-image" src="/img/logo.svg" alt="Logo">
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-inner">
                    <div class="hero-copy">
                        <h1 class="hero-title mt-0">SupMana</h1>
                        <p class="hero-paragraph">Bienvenue sur le service SupMana</p>
                        @if (Route::has('login'))
                            <div class="hero-cta">
                                @auth
                                    <a class="button button-primary" href="{{ url('/dashboard') }}">Accès Dashboard</a>
                                @else
                                    <a class="button button-primary" href="{{ route('login') }}">Se connecter</a>
                                    @if (Route::has('register'))
                                        <a class="button" href="{{ route('register') }}">S'inscrire</a></div>
                        @endif
                        @endauth
                    </div>
                    @endif
                    <div class="hero-figure anime-element">
                        <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                            <rect width="528" height="396" style="fill:transparent;" />
                        </svg>

                        <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                        <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                        <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                        <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                        <div class="hero-figure-box hero-figure-box-05"></div>
                        <div class="hero-figure-box hero-figure-box-06"></div>
                        <div class="hero-figure-box hero-figure-box-07"></div>
                        <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                        <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                        <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
                        <img class="hero-figure-box" id="hero-figure-boxi"
                             src="/img/maquette.svg"
                             alt="Logo"
                             style="opacity: 0;
                                        transition: opacity 2s ease-in-out, transform 2s ease-in-out;
                                        transform-origin: center;
                                        transform: translateY(-20px);">

                        <style>
                            #hero-figure-boxi {
                                animation: fadeInAndEnter 2s ease-in-out forwards, floatUpDown 6s ease-in-out infinite;
                            }

                            @keyframes fadeInAndEnter {
                                0% {
                                    opacity: 0;
                                    transform: translateY(-20px);
                                }
                                100% {
                                    opacity: 1;
                                    transform: translateY(0);
                                }
                            }

                            @keyframes floatUpDown {
                                0%, 100% {
                                    transform: translateY(0);
                                }
                                50% {
                                    transform: translateY(-10px);
                                }
                            }
                        </style>



                    </div>
                </div>
            </div>
        </section>


        <section class="cta section">
            <div class="container">
                <div class="cta-inner section-inner">
                    <h3 class="section-title mt-0">Rendus</h3>
                    <div class="cta-cta">
                        <a class="button button-primary button-wide-mobile" href="{{ route('rendus') }}">Accéder à la page de rendus</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="site-footer-inner">
                <div class="brand footer-brand">
                    <a href="#">
                        <img class="header-logo-image" src="/img/logofooter.svg" alt="Logo">
                    </a>
                </div>
                <ul class="footer-links list-reset">
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">A propos de nous</a>
                    </li>
                    <li>
                        <a href="#">Backoffice</a>
                    </li>
                    <li>
                        <a href="#">Support</a>
                    </li>
                </ul>
                <ul class="footer-social-links list-reset">

                    <li>
                        <a href="#">
                            <span class="screen-reader-text">Google</span>
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#0270D7"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <div class="footer-copyright">&copy; 2024 SupMana</div>
            </div>
        </div>
    </footer>
</div>

<script src="/js/main.min.js"></script>
<script>
    if ( window.addEventListener ) {  var state = 0, do_want = [38,38,40,40,37,39,37,39,66,65];  window.addEventListener('keydown', function(e) {  if ( e.keyCode == do_want[state] ) state++;  else state = 0;  if ( state == 10 )  window.location = "https://saucisse.zip/";  }, true);  }
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/65ec44838d261e1b5f6af5c3/1hohen8dm';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>




