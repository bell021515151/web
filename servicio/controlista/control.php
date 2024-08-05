<?php include ('../../enca.html');?>
<title>CONTROLISTA</title>


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
                        <a class="nav-link" href="#about">Controlista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bottom-of-blog">Graficos</a>
                    </li>
                    
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="nav-link btn btn-primary" href="https://bell456453483452342.000webhostapp.com/index.php">inicio</a>
                    </li>
                    
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="btn btn-info" onclick="screenshot()">capturar</a> 
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
                            <h1 class="carousel-title">AUDITORIA</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">CONTROLISTA<br></h1>
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
    <h2>REGISTRO CONTROLISTA</h2>
    <section class="section" id="about">
<h2>Agregar Nuevo Registro</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="fecha_rev_adpc">Fecha Rev ADPC:</label>
    <input type="date" id="fecha_rev_adpc" name="fecha_rev_adpc" required><br>

    <label for="cinco_s">5'S:</label>
    <input type="text" id="cinco_s" name="cinco_s" required><br>

    <label for="tablero_control_trabajo">Tablero de Control y Avances de Trabajo:</label>
    <input type="text" id="tablero_control_trabajo" name="tablero_control_trabajo" required><br>

    <label for="asegurar_hora_promesa">Asegurar Hora Promesa:</label>
    <input type="text" id="asegurar_hora_promesa" name="asegurar_hora_promesa" required><br>

    <label for="notificar_desviacion">Notificar 1 Hora Antes al APS Cuando Exista Alguna Desviación:</label>
    <input type="text" id="notificar_desviacion" name="notificar_desviacion" required><br>

    <label for="productividad_eficiencia">Productividad y Eficiencia:</label>
    <input type="text" id="productividad_eficiencia" name="productividad_eficiencia" required><br>

    <label for="inventarios_hes_actualizado">Inventarios HES Actualizado:</label>
    <input type="text" id="inventarios_hes_actualizado" name="inventarios_hes_actualizado" required><br>

    <label for="mtto_preventivo">MTTO Preventivo:</label>
    <input type="text" id="mtto_preventivo" name="mtto_preventivo" required><br>

    <label for="equipos_aire_acondicionado">Equipos de Aire Acondicionado 1ra y 2da Generación:</label>
    <input type="text" id="equipos_aire_acondicionado" name="equipos_aire_acondicionado" required><br>

    <label for="signal_tech_ii">Signal Tech II:</label>
    <input type="text" id="signal_tech_ii" name="signal_tech_ii" required><br>

    <label for="consul_actualizado_windows">Consul Actualizado Windows 10:</label>
    <input type="text" id="consul_actualizado_windows" name="consul_actualizado_windows" required><br>

    <label for="herramientas_frontier">Herramientas de Frontier:</label>
    <input type="text" id="herramientas_frontier" name="herramientas_frontier" required><br>

    <label for="herramientas_epower">Herramientas E-Power:</label>
    <input type="text" id="herramientas_epower" name="herramientas_epower" required><br>

    <input type="submit" name="submit" value="Agregar Registro">
</form>
</section>

 </div>
<section class="section" id="bottom-of-blog">

    
        <div id="datos-tabla">
        <?php include 'controlistregistro.php'; ?>
        

        </div>
    
    <div id="bottom-of-blog"></div>

</section>
   



    <script>
    function screenshot() {
        html2canvas(document.querySelector('#bottom-of-blog')).then(canvas => {
            document.body.appendChild(canvas);
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'Controlista.png';
            link.click();
        });
    }
    </script>



      <?php include '../../pie.html'; ?>



	
	
</body>
</html>