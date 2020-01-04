<?php
/**
 * Created by PhpStorm.
 * User: xalil
 * Date: 1/4/20
 * Time: 12:59 PM
 */
namespace PersianPdf\src;

use PersianPdf\src\library\TCPDF;

class PersianPdf
{
    /**
     * @var TCPDF
     */
    private $TCPDF;

    /**
     * PersianPdf constructor.
     * @param TCPDF $TCPDF
     */
    public function __construct(TCPDF $TCPDF)
        {

            $this->TCPDF = $TCPDF;
        }

        public  function handle($template,array $data, $filename = "pdfFile"){


            $this->TCPDF->setLanguageArray(config('PersianPdfConfig'));


            $this->TCPDF->SetFont('dejavusans', '', 12);

            $this->TCPDF->AddPage();

            $htmlpersian = view($template,$data)->render();
            $this->TCPDF->WriteHTML($htmlpersian, true, 0, true, 0);

            $this->TCPDF->setRTL(false);

            $this->TCPDF->SetFontSize(10);

            $this->TCPDF->Ln();

            $this->TCPDF->Output($filename.'.pdf', 'I');
        }
}