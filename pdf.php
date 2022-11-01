<?php

@include 'config.php';

require_once "vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;




      $options = new Options;
      $options->setChroot(__DIR__);
      $options->setIsRemoteEnabled(true);
      $dompdf = new Dompdf($options);
      ob_start();
      require('impdf.php');
      $html = ob_get_contents();
      ob_get_clean();
      $dompdf->loadHtml($html);
      $dompdf->setPaper('A4' , 'potrait');
      $dompdf->render();
      //$dompdf->ob_end_clean();
      $dompdf->stream('imprest.pdf', ['Attachment'=>false]);

?>