<?php include ('../enca.html');?>
<title>LAVADO</title>


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
                        <a class="nav-link" href="#about">Lavado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bottom-of-blog">Graficos</a>
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
                            <h1 class="carousel-title">AUDITORIA</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">LAVADO<br>DE UNIDADES</h1>
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
    <h2>REGISTRO DE LAVADO</h2>
    <form id="crud-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
         <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br
        
        <label for="nombre_unidad">Nombre de la unidad:</label>
<input type="text" id="nombre_unidad" name="nombre_unidad"><br><br>

      <label for="numero_orden">Número de orden:</label>
<input type="text" id="numero_orden" name="numero_orden"><br><br>

        <h2>EXTERIOR DE LA UNIDAD</h2>
        
        <label for="parrila">Parrila:</label>
        <input type="text" id="parrilla" name="parrilla"><br><br>
        
        <label for="cofre">Cofre:</label>
        <input type="text" id="cofre" name="cofre"><br><br>
        
        <label for="toldo">Toldo:</label>
        <input type="text" id="toldo" name="toldo"><br><br>
        
        <label for="cajuela">Cajuela/Puerta:</label>
        <input type="text" id="cajuela" name="cajuela"><br><br>
        
        <label for="lado_izquierdo">Lado izquierdo:</label>
        <input type="text" id="lado_izquierdo" name="lado_izquierdo"><br><br>
        
        <label for="rines">Rines/Llantas:</label>
        <input type="text" id="rines" name="rines"><br><br>
        
        <label for="lado_derecho">Lado Derecho:</label>
        <input type="text" id="lado_derecho" name="lado_derecho"><br><br>
        
        <label for="protectores">Protectores:</label>
        <input type="text" id="protectores" name="protectores"><br><br>
        
        <h2>INTERIOR DE LA UNIDAD</h2>
        
        <label for="vidrios">Vidrios:</label>
        <input type="text" id="vidrios" name="vidrios"><br><br>
        
        <label for="asientos">Asientos:</label>
        <input type="text" id="asientos" name="asientos"><br><br>
        
        <label for="tapetes">Tapetes:</label>
        <input type="text" id="tapetes" name="tapetes"><br><br>
        
        <label for="puertas_interior">Puertas interior:</label>
        <input type="text" id="puertas_interior" name="puertas_interior"><br><br>
        
        <label for="tablero">Tablero:</label>
        <input type="text" id="tablero" name="tablero"><br><br>
        
        <label for="marcos">Marcos:</label>
        <input type="text" id="marcos" name="marcos"><br><br>
       
       <label for="motor">Motor:</label>
        <input type="text" id="motor" name="motor"><br><br>
        
        <button type="submit" name="submit">Guardar</button>
    </form>
</div>
</section>

<section class="section" id="bottom-of-blog">
        <h2>LAVADO</h2>
    
        <div id="datos-tabla">
        <?php include 'lavadoregistro.php'; ?>
        

        </div>
    </div>
    <div id="bottom-of-blog"></div>
<br>
<br>
<br>
</section>

<button onclick="screenshot()">Capturar</button>

    <script>
    function screenshot() {
        html2canvas(document.querySelector('#bottom-of-blog')).then(canvas => {
            document.body.appendChild(canvas);
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'Lavado.png';
            link.click();
        });
    }
    </script>




      <?php include '../pie.html'; ?>



	
	
</body>
</html>