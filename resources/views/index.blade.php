<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    {{-- <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon"> --}}

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/styles_index.css') }}">

    <title>SeñaKids</title>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <i class="ri-rocket-2-line">SeñaKids</i>
            </a>
            
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#" class="nav__link">Inicio</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Temas</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Recursos</a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link">Traductor</a>
                    </li>
                </ul>

                <a href="{{ url('/admin') }}" class="nav__button">Acceder</a>

                <!-- Close button -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <!-- Toggle button -->
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-apps-2-line"></i>
            </div>
        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home">
            <div class="home__container container">
                <div class="home__content">
                    <h3 class="home__subtitle">
                        ¡Diviértete aprendiendo!
                    </h3>

                    <h1 class="home__title">
                        <span>
                            {{-- SeñaKids: ¡Tu aventura <br>para aprender LSB! --}}
                            SeñaKids:<br>¡Aprendamos LSB!
                        </span>

                        <img src="{{ asset('img/line.svg') }}" alt="">
                    </h1>

                    <p class="home__description">
                        Explora 
                        {{-- el mundo de  --}}
                        la Lengua de Señas Boliviana de una forma única y divertida, con juegos, 
                        cuentos fascinantes y realidad aumentada.
                        {{-- que hacen el aprendizaje aún más emocionante. --}} 
                    </p>

                    <a href="#" class="home__button">
                        Registrarte
                    </a>
                </div>

                <div class="home__images">
                    <img src="{{ asset('images/points-space.svg') }}" alt="image" class="home__points">
                    <img src="{{ asset('images/planet.svg') }}" alt="image" class="home__planet-2">
                    <img src="{{ asset('images/planet.svg') }}" alt="image" class="home__planet-1">
                    <img src="{{ asset('images/rocket.svg') }}" alt="image" class="home__rocket">
                </div>
            </div>

            <img src="{{ asset('images/clouds-1.svg') }}" alt="image" class="home__cloud-1">
            <img src="{{ asset('images/clouds-2.svg') }}" alt="image" class="home__cloud-2">
            
        </section>
    </main>
    
    <!--=============== GSAP ===============-->
    <script src="{{ asset('js/gsap.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
