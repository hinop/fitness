<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {

    public function __construct() {
        $this->dompdf = new Dompdf();
    }

    public function generate($html, $filename) {
        $this->dompdf->loadHtml($html);
        $this->dompdf->render();
        $this->dompdf->stream($filename);
    }*/
    defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);



class Pdf extends Dompdf{
    function __construct()
    {
        parent::__construct();
    }
}

