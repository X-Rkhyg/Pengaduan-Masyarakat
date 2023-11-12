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

    public function generatePDFmonthly()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)
        ->where("YEAR(tanggal_pengaduan) =", $currentYear)
        ->findAll();
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

    public function generatePDFdaily()
    {

        $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->findAll();

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
