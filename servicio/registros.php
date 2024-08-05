      <?php include '../enca.php'; ?>
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
    <h2>REGISTRO DE REFACCIONES</h2>
    <form id="crud-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>
        
        <label for="fecha_rev_adpc">Fecha de Rev. ADPC:</label>
        <input type="date" id="fecha_rev_adpc" name="fecha_rev_adpc"><br><br>
        
        <label for="num_orden"># de Orden:</label>
        <input type="text" id="num_orden" name="num_orden"><br><br>
        
        <label for="cinco_s">87-5'S:</label>
        <input type="text" id="cinco_s" name="cinco_s"><br><br>
        
        <label for="refacciones_pasillos">89-Refacciones en Pasillo (Piso):</label>
        <input type="text" id="refacciones_pasillos" name="refacciones_pasillos"><br><br>
        
        <label for="accesorio_lugar_posicion">90-Accesorio en Lugar y Posición:</label>
        <input type="text" id="accesorio_lugar_posicion" name="accesorio_lugar_posicion"><br><br>
        
        <label for="focos_funcionales">91-Focos Funcionales:</label>
        <input type="text" id="focos_funcionales" name="focos_funcionales"><br><br>
        
        <label for="orden_ventanilla">92-Orden en Ventanilla:</label>
        <input type="text" id="orden_ventanilla" name="orden_ventanilla"><br><br>
        
        <label for="exceso_polvo_anaqueles">93-Exceso de Polvo en Anaqueles y Accesorio:</label>
        <input type="text" id="exceso_polvo_anaqueles" name="exceso_polvo_anaqueles"><br><br>
        
        <label for="precio_accesorio">94-Precio de Accesorio:</label>
        <input type="text" id="precio_accesorio" name="precio_accesorio"><br><br>
        
        <label for="accesorio_exhibicion">95-Accesorio en Exhibición:</label>
        <input type="text" id="accesorio_exhibicion" name="accesorio_exhibicion"><br><br>
        
        <label for="96">96-Piso Epóxico:</label>
        <input type="text" id="96" name="96"><br><br>
        
        <label for="97">97-Inventario Actualizado:</label>
        <input type="text" id="97" name="97"><br><br>

        <label for="98">98-No deben existir partes desensambladas o piezas usadas dentro del almacen:</label>
        <input type="text" id="98" name="98"><br><br>

        <label for="99">99-Los racks deben estar ordenados, limpios y contener únicamente refacciones nuevas:</label>
        <input type="text" id="99" name="99"><br><br>

        <label for="100">100-No deben existir partes fuera del estante de piezas, pasillos, área de trabajo, etc:</label>
        <input type="text" id="100" name="100"><br><br>
        
        <label for="101">101-No se debe almacenar las refacciones inestablemente (riesgo de caer o desprenderse):</label>
        <input type="text" id="101" name="101"><br><br>

        <label for="102">102-Los racks deben tener etiquetadas las ubicaciones y debe existir un reporte actualizado que identifique cada número de parte con su ubicación para facilitar la búsqueda de partes:</label>
        <input type="text" id="102" name="102"><br><br>

        <label for="103">103-El mostrador de refacciones debe estar limpio, ordenado, sin cajas, refacciones o papelería, con catálogos disponibles, y sin objetos ajenos a la operación para facilitar la transacción con el cliente:</label>
        <input type="text" id="103" name="103"><br><br>

        <label for="104">104-No debe haber objetos en el mostrador, estos deben tener un lugar asignado (dentro de un cajón, al lado del teléfono, etc.):</label>
        <input type="text" id="104" name="104"><br><br>

        <label for="105">105-Los muros y/o paredes del mostrador de refacciones deben encontrarse libres de daño y sin suciedad:</label>
        <input type="text" id="105" name="105"><br><br>

        <label for="106">106-El techo del mostrador de refacciones debe encontrarse libres de daño y suciedad :</label>
        <input type="text" id="106" name="106"><br><br>
        
        <label for="107">107-El piso del mostrador de refacciones debe encontrarse libre de daño y sin suciedad:</label>
        <input type="text" id="107" name="107"><br><br>
        
        <label for="108">108-Los vidrios de las ventanas deben estar en buen estado(sin grietas o roturas) y limpios:</label>
        <input type="text" id="108" name="108"><br><br>
        
        <label for="109">109-No debe de haber basura en el piso del mostrador:</label>
        <input type="text" id="109" name="109"><br><br>
        
        <label for="110">110-No debe de haber lamparas, bulbos o focos fundidos en el area del mostrador:</label>
        <input type="text" id="110" name="110"><br><br>
        
        <label for="111">111-No debe de haber lamparas, bulbos o focos dañados y/o sucios en el area del mostrador:</label>
        <input type="text" id="111" name="111"><br><br>

        <label for="112">112-la ventanilla de refacciones hacia el taller debe estar ordenada, sin piezas nuevas o usadas almacenadas temporalmente, debe de contar con medios para controlar rel surtido orden por orden(una PC, un control de papeletas ordenado y actualizado, etc) :</label>
        <input type="text" id="112" name="112"><br><br>
        
        <label for="113">113-Los extintores( o equipos anti incendios) deben ser inspeccionados periodicamente y se encuentran listos para usarse en caso de emergencia:</label>
        <input type="text" id="113" name="113"><br><br>

        <button type="submit" name="submit">Guardar</button>
    </form>
</div>
</section>

<section class="section" id="bottom-of-blog">
        <h2>Datos Registrados</h2>
    
        <div id="datos-tabla">
        <?php include 'REFA.php'; ?>
        

        </div>
    </div>
    <div id="bottom-of-blog"></div>
<br>
<br>
<br>
</section>






<section class="section" id="graficos">
        <div class="container">
           
        <div style="width: 80%; margin: auto;">
        <canvas id="myChart" width="1000" height="500"></canvas>

    </div>
    <script>
        // Datos para la gráfica
        var data = <?php echo json_encode($data); ?>;

        // Preparar etiquetas y datos para Chart.js
        var labels = Object.keys(data);
        var data_ok = [];
        var data_ng = [];

        for (var i = 0; i < labels.length; i++) {
            data_ok.push(data[labels[i]].ok);
            data_ng.push(data[labels[i]].ng);
        }

        // Configuración del gráfico
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'OK',
                    data: data_ok,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'NG',
                    data: data_ng,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
        </div>
    </section>



      <?php include '../pie.html'; ?>



	
	
</body>
</html>
