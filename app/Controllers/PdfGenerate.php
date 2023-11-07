<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\PengaduanModel;

class PdfGenerate extends BaseController
{

    protected $PengaduanModel;

    public function __construct()
    {
        $this->PengaduanModel = new PengaduanModel();
    }

    public function generatePDF()
    {

        $pengaduan = $this->PengaduanModel->findAll();

        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view', $data);

        // Create PDF instance
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Load HTML content into DOMPDF
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output the generated PDF to browser
        $dompdf->stream("Laporan Pengaduan Masyarakat Tahun 2023.pdf", ['Attachment' => false]);
    }


}
