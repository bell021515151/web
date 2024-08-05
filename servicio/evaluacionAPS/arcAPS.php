<?php include ('../../enca.html');?>
<title>APS ARCHIVO</title>


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
                        <a class="nav-link" href="#about">ARCHIVO</a>
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
                            <h1 class="carousel-title">ASESOR<BR> PROFECIONAL<br>SERVICIO</h1>
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
    <h2>REGISTRO APS ARCHIVO</h2>
    <section class="section" id="about">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="archivo">Archivo:</label>
                <input type="text" id="archivo" name="archivo" required>
                
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>
                
                <label for="fecha_rev_adpc">Fecha Rev ADPC:</label>
                <input type="date" id="fecha_rev_adpc" name="fecha_rev_adpc" required>
                
                <label for="asesor">Asesor:</label>
                <input type="text" id="asesor" name="asesor" required>
                
                <label for="orden">Orden:</label>
                <input type="text" id="orden" name="orden" required>
                
                <label for="profeco_firmas">Profeco Firmas:</label>
                <input type="text" id="profeco_firmas" name="profeco_firmas">
                
                <label for="sello_wpd">Sello WPD:</label>
                <input type="text" id="sello_wpd" name="sello_wpd">
                
                <label for="fecha_firma_cliente">Fecha Firma Cliente:</label>
                <input type="text" id="fecha_firma_cliente" name="fecha_firma_cliente">
                
                <label for="llamada_confirmacion">Llamada Confirmación:</label>
                <input type="text" id="llamada_confirmacion" name="llamada_confirmacion">
                
                <label for="encuesta_salida">Encuesta Salida:</label>
                <input type="text" id="encuesta_salida" name="encuesta_salida">
                
                <label for="control_calidad">Control Calidad:</label>
                <input type="text" id="control_calidad" name="control_calidad">
                
                <label for="tres_firmas">Tres Firmas:</label>
                <input type="text" id="tres_firmas" name="tres_firmas">
                
                <label for="llenado_checklist_lavado">Llenado Checklist Lavado:</label>
                <input type="text" id="llenado_checklist_lavado" name="llenado_checklist_lavado">
                
                <label for="firmas_lavado">Firmas Lavado:</label>
                <input type="text" id="firmas_lavado" name="firmas_lavado">
                
                <label for="ticket_bateria">Ticket Batería:</label>
                <input type="text" id="ticket_bateria" name="ticket_bateria">
                
                <label for="presupuesto">Presupuesto:</label>
                <input type="text" id="presupuesto" name="presupuesto">
                
                <label for="hoja_diagnostico">Hoja Diagnóstico:</label>
                <input type="text" id="hoja_diagnostico" name="hoja_diagnostico">
                
                <label for="calificacion">Calificación:</label>
                <input type="number" id="calificacion" name="calificacion" min="0" max="100" required>
                
                <label for="tecnico">Técnico:</label>
                <input type="text" id="tecnico" name="tecnico" required>
                
                <label for="lavador">Lavador:</label>
                <input type="text" id="lavador" name="lavador" required>
                
                <button type="submit" name="submit">Guardar Registro</button>
            </form>
</section>

 </div>
<section class="section" id="bottom-of-blog">

    
        <div id="datos-tabla">
        <?php include 'apsControl.php'; ?>
        

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