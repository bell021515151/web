      <?php include '../enca.html'; ?>
       <title>Refacciones</title>

    <style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            text-align: center;
            font-size: 12px; /* Ajusta este valor según tus necesidades */
            position: sticky;
            top: 60px; /* Ajusta este valor según la altura de tu nav */
            background: #fff; /* Color de fondo de los encabezados */
            z-index: 1; /* Asegúrate de que los encabezados estén encima del contenido */
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <nav id="scrollspy" class="navbar navbar-light bg-light navbar-expand-lg fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="https://bell456453483452342.000webhostapp.com/assets/imgs/brand.svg" alt="" class="brand-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Refacciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bottom-of-blog">Datos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#graficos">Gráficos</a>
                    </li>
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="nav-link btn btn-primary" href="https://bell456453483452342.000webhostapp.com/index.php">inicio</a>
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
                            <h1 class="carousel-title">REFACCIONES</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">AUDITORIA <br> INTERNA</h1>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="infos container mb-4 mb-md-2">
            <div class="title">
                <h6 class="subtitle font-weight-normal"></h6>
                <h5>Con rumbo a un mundo mejor.</h5>
                <p class="font-small">Sistema de auditorias internas </p>
            </div>
            <div class="socials text-right">
                <div class="row justify-content-between">
                    <div class="col">
                        <h6 class="subtitle font-weight-normal mb-2">Social Media</h6>
                        <div class="social-links">
                            <a href="https://www.facebook.com/NISSANDELBRAVO/?locale=es_LA" class="link pr-1"><i class="ti-facebook"></i></a>
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-twitter-alt"></i></a>
                            <a href="https://www.instagram.com/nissandelbravo/?hl=es" class="link pr-1"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="section" id="about">
        <div class="container mb-3">
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                h2 {
                    color: #333;
                    text-align: center;
                    margin-bottom: 20px;
                }
                form {
                    display: flex;
                    flex-direction: column;
                    align-items: stretch;
                }
                label {
                    margin: 10px 0 5px 0;
                    font-weight: bold;
                }
                input[type="text"], input[type="date"] {
                    padding: 10px;
                    margin: 5px 0 10px 0;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    width: 100%;
                    box-sizing: border-box;
                }
                button {
                    padding: 10px 20px;
                    background: #28a745;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    margin: 20px 0;
                    display: block;
                    width: 100%;
                    font-size: 16px;
                    box-sizing: border-box;
                }
                button:hover {
                    background: #218838;
                }
            </style>
            <br>
    

<section class="section" id="bottom-of-blog">
        
    
        <div id="datos-tabla">
        <?php include 'REFA.php'; ?>
        

        </div>
    </div>
    <div id="bottom-of-blog"></div>
<br>
<br>
<br>
</section>










        <?php include '../pie.html'; ?>



	
	
</body>
</html>
