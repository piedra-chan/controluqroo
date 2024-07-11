<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de accesos</title>
    <link href="https://cdn.jsdelivr.net/npm/apexcharts@3.33.2/dist/apexcharts.css" rel="stylesheet">
</head>

<body>
    <!--HEADER-->
    <table class="div-1Header">
        <tr>
            <td class="logotd">
            <img src="https://i.ibb.co/2n0C55B/Escudo-UAEQROO-Oficial-01.png" style="width: 200px; height: auto;" alt="Escudo-UAEQROO-Oficial-01" border="0" />
            </td>
            <td class="datos-grales-td">
                <table class="table_h_factura">
                    <thead>
                        <th class="headerDatosh titulos">Folio: <span class="titulos">{{ $uuid }}</span></th>
                    </thead>
                    <tr>
                        <td class="titulos">
                            <p class="titulos">Universidad Autónoma del Estado de Quintana Roo</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                DIRECCIÓN: <span>Blvd. Bahía s/n, Del Bosque, 77019 Chetumal, Q.R.</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>TELEFONO: <span>983 835 0300</span> </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--DATOS-->
    <table class="div-1Datos">
        <tr>
            <td class="receptor">
                <table class="table_receptor">
                    <tr>
                        <td class="titulos">
                            <p class="titulos tituloRec">IMPORTANTE</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                El conteo de accesos del mes inicial comienza desde el día exacto de la fecha inicial,
                                asimismo el conteo del mes final termina hasta el día exacta de la fecha final</span>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="datosGral">
                <table class="table_datos">
                    <tr>
                        <td>
                            <p>
                                FECHA INICIAL:
                            </p>
                        </td>
                        <td>
                            <p>
                               {{ $fecha_inicial }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                FECHA FINAL:
                            </p>
                        </td>
                        <td>
                            <p>
                               {{ $fecha_final }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                ÁREA:
                            </p>
                        </td>
                        <td>
                            <p>
                               {{ $nombre_area}}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
    
    <table class="table_materiales">
        <thead>
            <tr>

            @foreach($mesesOrdenados as $mes)
                <td>{{ $mes }}</td>    
            @endforeach

            </tr>
        </thead>
        <tbody>
            <tr>
            @foreach($data as $dato)
            <td>{{ $dato }}</td>
            @endforeach
            </tr>
        </tbody>
    </table>

<div id="chart">
<img src="{{ 'https://quickchart.io/chart?c=' . urlencode(json_encode([
        'type' => 'bar',
        'data' => [
            'labels' => $mesesOrdenados,
            'datasets' => [
                [
                    'label' => 'Usuarios',
                    'data' => $data,
                ]
            ]
        ]
    ])) }}" alt="Gráfico de Accesos Mensuales"   width="600" 
    height="300">
</div>
         <!--DATOS FINALES-->
     <table class="div-1Datos">
        <tr>
            <td class="">
                <table class="table_datosFtxt">
                    <tr>
                        <td>
                            <p>Este informe refleja el compromiso continuo de nuestra organización con la seguridad y el control de accesos como prioridad estratégica.</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="datosFinales">
                <table class="table_datosfinales">
                    <tr>
                        <td>
                            <p>
                                Accesos permitidos:
                            </p>
                        </td>
                        <td>
                            <p>
                               {{ $conteo_permitidos }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                Accesos denegados:
                            </p>
                        </td>
                        <td>
                            <p>
                               {{ $conteo_denegados }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                Total de accesos:
                            </p>
                        </td>
                        <td>
                            <p>
                               {{ $conteo_denegados + $conteo_permitidos }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--FIRMA-->
    <div class="firma">
        Firma del administrador
    </div>


    <!--FOOTER-->
    <footer>
        <p></p>
    </footer>

         

</body>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.33.2/dist/apexcharts.min.js"></script>
</html>
<style>
    /*ESTILOS GRALES*/
    * {
        font-family: 'Times New Roman', Times, serif;
        font-size: 12px;
    }

    .titulos {
        font-size: 15px;
        text-transform: uppercase;
    }

    /*HEADER*/
    .div-1Header, .div-1Datos {
        width: 100%;
    }

    .logotd {
        width: 50%;
        height: auto;
    }

    .datos-grales-td, .receptor{
        width: 50%;
    }

    .table_h_factura{
        width: 50%;
        height: 150px;
        background-color: #FFF;
        width: 100%;
        margin: 0px;
        padding: 0px;
    }
    .headerDatosh {
        text-align: right;
        color: #FFF;
        padding: 5px;
        background-color: #00492c;
    }

    .table_h_factura tr td p {
        margin: 0px;
        padding: 2px;
        text-align: right;
        padding-right: 5px;
    }
    /*DATOS*/
    .table_receptor, .table_datos {
        width: 42%;
        height: 100px;
        background-color: rgba(243, 243, 243, 0.521);
        width: 100%;
        margin: 0px;
        padding: 10px;
        border-radius: 5px;
    }
    .table_receptor tr td p{
        margin: 0px;
        padding: 2px;
        text-align: left;
    }
    .tituloRec{
        color: rgb(24, 140, 207);
    }
    .table_datos tr td p{
        margin: 0px;
        padding: 2px;
        text-align: left;
    }
    /*MATERIALES*/
    .table_materiales{
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .table_materiales thead tr{
        background-color: #00492c;
        color: #FFF;
    }
    .table_materiales thead tr td{
        padding: 5px;
        text-align: center;
        font-size: 14px;
    }
    .table_materiales tr td{
        text-align: center;
        padding: 5px;
        border-bottom: 1px solid rgba(20, 20, 20, 0.096);
    }
    /*DATOS FINALES*/
    .table_datosFtxt{
        width: 70%;
        height: 100px;
        width: 100%;
        margin: 0px;
    }
    .datosFinales{
        width: 30%;
    }
    .datosFinales .table_datosfinales{
        width: 42%;
        height: 100px;
        width: 100%;
        margin: 0px;
        padding: 10px;
        border: 1px solid rgba(20, 20, 20, 0.096);
    }
    .datosFinales .table_datosfinales tr td p{
        margin: 0px;
        padding: 2px;
        text-align: left;
    }
    /*FIRMA*/
    .firma{
        border-top: 1px solid rgba(20, 20, 20, 0.5);
        text-align: center;
        width: 30%;
        margin-left: 70%;
        margin-top: 80px;
        padding-top:5px;
    }
    /*FOOTER*/
    footer{
        width: 100%;
        text-align: center;
        position: absolute;
        bottom: 0px;
    }
</style>

