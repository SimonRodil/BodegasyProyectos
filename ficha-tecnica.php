<?php

if(!isset($_GET['propiedad'])): header('location: ./');
endif;

require('mod/config.php');
require('mod/propiedades.php');

$con_propiedades = new Propiedades();
$con_galeria = new Galeria();
$query_propiedad = $con_propiedades->SelPropiedad($_GET['propiedad']);

if(!$query_propiedad->num_rows): header('location: ./');
endif;

$propiedad = $query_propiedad->fetch_array();

$query_imagenes = $con_galeria->SelGaleria($propiedad['id']);

/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    require('./assets/libs/html2pdf/template.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once('./assets/libs/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es');
        $html2pdf->pdf->SetDisplayMode('fullpage');
//      $html2pdf->pdf->SetProtection(array('print'), 'spipu');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('ficha-tecnica-'.$propiedad['id'].'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>