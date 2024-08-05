<?php include ('../enca.html');?>
<title>HyP</title>


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
                        <a class="nav-link" href="#about">HyP</a>
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
                            <h1 class="carousel-title">HOJALATERIA<br>Y PINTURA</h1>
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
    <h2>REGISTRO DE HyP</h2>
    <form id="crud-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <label for="nombre_trabajador">Nombre del Trabajador:</label>
<input type="text" id="nombre_trabajador" name="nombre_trabajador" autocomplete="off"><br><br>

        
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" autocomplete="off" required><br><br>
        
        <label for="area_trabajo_limpieza">Area de trabajo (limpieza):</label>
        <input type="text" id="area_trabajo_limpieza" name="area_trabajo_limpieza" autocomplete="off"><br><br>
        
        <label for="area_trabajo_orden">Area de trabajo (orden):</label>
        <input type="text" id="area_trabajo_orden" name="area_trabajo_orden" autocomplete="off"><br><br>
        
        <label for="uso_equipo_seguridad">Uso de equipo de seguridad:</label>
        <input type="text" id="uso_equipo_seguridad" name="uso_equipo_seguridad" autocomplete="off"><br><br>
        
        <label for="uniforme">Uniforme:</label>
        <input type="text" id="uniforme" name="uniforme" autocomplete="off"><br><br>
        
        <label for="protectores_unidad">Protectores de la unidad:</label>
        <input type="text" id="protectores_unidad" name="protectores_unidad" autocomplete="off"><br><br>
        
        <label for="uso_correcto_herramienta">Uso correcto de la herramienta:</label>
        <input type="text" id="uso_correcto_herramienta" name="uso_correcto_herramienta" autocomplete="off"><br><br>
        
        <label for="bote_basura">Bote de basura:</label>
        <input type="text" id="bote_basura" name="bote_basura" autocomplete="off"><br><br>
        
        <label for="alimento_area_trabajo">Alimento en área de trabajo:</label>
        <input type="text" id="alimento_area_trabajo" name="alimento_area_trabajo" autocomplete="off"><br><br>
        
        <label for="polvo_paredes_polines">Polvo en paredes y polines:</label>
        <input type="text" id="polvo_paredes_polines" name="polvo_paredes_polines" autocomplete="off"><br><br>
        
        <label for="joyeria">Joyería:</label>
        <input type="text" id="joyeria" name="joyeria" autocomplete="off"><br><br>
        
        <label for="almacenamiento_herramienta">Almacenamiento de la herramienta:</label>
        <input type="text" id="almacenamiento_herramienta" name="almacenamiento_herramienta" autocomplete="off"><br><br>
        
        <label for="extintores">Extintores:</label>
        <input type="text" id="extintores" name="extintores" autocomplete="off"><br><br>
        
        <label for="material_limpieza">Material de limpieza:</label>
        <input type="text" id="material_limpieza" name="material_limpieza" autocomplete="off"><br><br>
        
       
        <button type="submit" name="submit">Guardar</button>
    </form>
</div>
</section>

<section class="section" id="bottom-of-blog">

    
        <div id="datos-tabla">
        <?php include 'hypregistro.php'; ?>
        

        </div>
    </div>
    <div id="bottom-of-blog"></div>
<br>
<br>
<br>
</section>


        <h2>Eliminar Registros</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="delete-form">
            <label for="nombre_trabajador">Nombre del Trabajador:</label>
            <input type="text" name="nombre_trabajador" id="nombre_trabajador" required>
            <button type="submit" name="delete">Eliminar Registros</button>
        </form>


<button onclick="screenshot()">Capturar</button>

    <script>
    function screenshot() {
        html2canvas(document.querySelector('#bottom-of-blog')).then(canvas => {
            document.body.appendChild(canvas);
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'HyP.png';
            link.click();
        });
    }
    </script>



      <?php include '../pie.html'; ?>



	
	
</body>
</html>