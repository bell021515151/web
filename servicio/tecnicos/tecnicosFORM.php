<?php include ('../../enca.html'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>TECNICOS FORM</title>
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
            font-size: 12px;
            position: sticky;
            top: 60px;
            background: #fff;
            z-index: 1;
        }

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
                        <a class="nav-link" href="#about">Tecnicos</a>
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
                            <h1 class="carousel-title">TECNICOS</h1>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="infos container mb-4 mb-md-2">
            <div class="title">
                <h6 class="subtitle font-weight-normal"></h6>
                <h5>Con rumbo a un mundo mejor.</h5>
                <p class="font-small">Sistema de auditorias internas</p>
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
            <br>
            <h2>REGISTRO DE TECNICOS</h2>
            <form id="crud-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha"><br><br>
                
                <label for="fecha_rev_adpc">Fecha Rev ADPC:</label>
                <input type="date" id="fecha_rev_adpc" name="fecha_rev_adpc"><br><br>
                
                <label for="tecnico">Técnico:</label>
                <input type="text" id="tecnico" name="tecnico"><br><br>
                
                <label for="numero_orden"># Orden:</label>
                <input type="text" id="numero_orden" name="numero_orden"><br><br>
                
                <label for="hoes">HOE's:</label>
                <input type="text" id="hoes" name="hoes"><br><br>
                
                <label for="him_llena_correctamente">HIM Llenar Correctamente:</label>
                <input type="text" id="him_llena_correctamente" name="him_llena_correctamente"><br><br>
                
                <label for="wpd">WPD:</label>
                <input type="text" id="wpd" name="wpd"><br><br>
                
                <label for="equipo_seguridad">Equipo de Seguridad:</label>
                <input type="text" id="equipo_seguridad" name="equipo_seguridad"><br><br>
                
                <label for="protecciones_unidades">Protecciones en Unidades:</label>
                <input type="text" id="protecciones_unidades" name="protecciones_unidades"><br><br>
                
                <label for="separacion_residuos">Separación de Residuos:</label>
                <input type="text" id="separacion_residuos" name="separacion_residuos"><br><br>
                
                <label for="5s">5's:</label>
                <input type="text" id="5s" name="5s"><br><br>
                
                <label for="orden_herramienta">Orden de Herramienta:</label>
                <input type="text" id="orden_herramienta" name="orden_herramienta"><br><br>
                
                <label for="bernier">Bernier:</label>
                <input type="text" id="bernier" name="bernier"><br><br>
                
                <label for="herramienta_piso">Herramienta en Piso:</label>
                <input type="text" id="herramienta_piso" name="herramienta_piso"><br><br>
                
                <label for="h_diagnostico">H. Diagnóstico:</label>
                <input type="text" id="h_diagnostico" name="h_diagnostico"><br><br>
                
                <label for="ticket_bateria">Ticket de Batería:</label>
                <input type="text" id="ticket_bateria" name="ticket_bateria"><br><br>
                
                <input type="submit" name="submit" value="Enviar">

            </form>
        </div>
    </section>

    <section class="section" id="bottom-of-blog">
        <div id="datos-tabla">
            <?php include 'tecR.php'; ?>
        </div>
        <br>
    </section>
    <h2>Eliminar Registros</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="delete-form">
            <label for="tecnico">Nombre del Técnico a Eliminar:</label>
            <input type="text" id="tecnico" name="tecnico" required>
            <input type="submit" name="delete" value="Eliminar">
        </form>
    </div>

    <button onclick="screenshot()">Capturar</button>

    <script>
    function screenshot() {
        html2canvas(document.querySelector('#bottom-of-blog')).then(canvas => {
            document.body.appendChild(canvas);
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'Tecnicos.png';
            link.click();
        });
    }
    </script>

    <?php include '../../pie.html'; ?>
</body>
</html>
