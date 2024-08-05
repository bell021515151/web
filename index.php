      <?php include 'enca.html'; ?>
      <TITLE>INICIO</TITLE>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar navbar-light bg-light navbar-expand-lg fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/imgs/brand.svg" alt="" class="brand-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Modulos</a>
                    </li>

                    
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="nav-link btn btn-primary" href="https://bell456453483452342.000webhostapp.com/index.php#home">inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <header id="home" class="header">
        <div class="overlay"></div>

        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">  
            <div class="container">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">Nissan<br>Del Bravo</h1>
                            <button class="btn btn-primary btn-rounded">Learn More</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">Bienvenido</h1>
                            <button class="btn btn-primary btn-rounded">Learn More</button>
                          </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">AUDITORIAS</h1>
                            <button class="btn btn-primary btn-rounded">Learn More</button>
                          </div>
                    </div>
                </div>
            </div>        
        </div>

        <div class="infos container mb-4 mb-md-2">
            <div class="title">
                <h6 class="subtitle font-weight-normal"></h6>
                <h5>Con rumbo a un mundo mejor.</h5>
                <p class="font-small">sistema de auditorias internas </p>
            </div>
            <div class="socials text-right">
                <div class="row justify-content-between">
                    
                    <div class="col">
                        <h6 class="subtitle font-weight-normal mb-2">Social Media</h6>
                        <div class="social-links">
                            <a href="https://www.facebook.com/NISSANDELBRAVO/?locale=es_LA" class="link pr-1"><i class="ti-facebook"></i></a>
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-twitter-alt"></i></a>
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-google"></i></a>
                            <a href="https://www.instagram.com/nissandelbravo/?hl=es" class="link pr-1"><i class="ti-instagram"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
    }
    .widget {
        cursor: pointer;
        text-align: center;
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #f9f9f9;
    }
    .widget:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .icon-wrapper {
        font-size: 2.5em;
        margin-bottom: 15px;
        color: #007bff;
    }
    .infos-wrapper {
        margin-top: 10px;
    }
    .infos-wrapper h4 {
        font-size: 1.2em;
        color: #333;
    }
    .infos-wrapper p {
        font-size: 0.9em;
        color: #666;
    }
</style>
</head>
<body>
    
    <div class = "hola">
    <section class="section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 mb-4">
                    <h6 class="xs-font mb-0">auditoria</h6>
                    <h3 class="section-title">MODULOS</h3>
                </div>
                <div class="col-12">
                    <div class="grid-container">
                        <div class="widget" onclick="window.open('https://bell456453483452342.000webhostapp.com/refacciones/registros.php')">
                            <div class="icon-wrapper">
                                <i class="ti-calendar"></i>
                            </div>
                            <div class="infos-wrapper">
                                <h4 class="text-primary">REFACCIONES</h4>
                            </div>
                        </div>
                        <div class="widget" onclick="window.open('https://bell456453483452342.000webhostapp.com/hyp/hyp.php')">
                            <div class="icon-wrapper">
                                <i class="ti-face-smile"></i>
                            </div>
                            <div class="infos-wrapper">
                                <h4 class="text-primary">HOJALATERIA Y PINTURA</h4>
                            </div>
                        </div>
                        <div class="widget" onclick="window.open('/servicio/indexserv.php#home')">
                            <div class="icon-wrapper">
                                <i class="ti-star"></i>
                            </div>
                            <div class="infos-wrapper">
                                <h4 class="text-primary">SERVICIO</h4>
                            </div>
                        </div>
                        
                        
                        <div class="widget" onclick="window.open('https://bell456453483452342.000webhostapp.com/lavado/lavado.php')">
                            <div class="icon-wrapper">
                                <i class="ti-calendar"></i>
                            </div>
                            <div class="infos-wrapper">
                                <h4 class="text-primary">LAVADO</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Cierre de row align-items-center -->
        </div> <!-- Cierre de container -->
    </section>
    


    
	
  <?php include 'pie.html'; ?>


</body>
</html>
