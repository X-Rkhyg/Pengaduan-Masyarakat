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

    public function generatePDFalltime()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_tahun', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat.pdf", ['Attachment' => false]);
    }
    public function generatePDFyearly()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_tahun', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFyearly_novalidate()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '0')->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_tahun', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFyearly_validate()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '1')->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_tahun', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFyearly_ditanggapi()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '2')->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_tahun', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFyearly_ditolak()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", 'ditolak')->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_tahun', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }
    public function generatePDFmonthly()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

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
        $html = view('generate_laporan/pdf_view_bulan', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFmonthly_novalidate()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)
        ->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '0')
        ->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_bulan', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFmonthly_validate()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)
        ->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '1')
        ->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_bulan', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFmonthly_ditanggapi()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)
        ->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '2')
        ->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_bulan', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFmonthly_ditolak()
    {
        $currentMonth = date('m'); // Get the current month
        $currentYear = date('Y'); // Get the current year

        $bulan = date('F', strtotime($currentMonth));

        $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)
        ->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", 'ditolak')
        ->findAll();
        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_bulan', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Bulan $bulan $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFdaily()
    {
        $currentYear = date('Y'); // Get the current year

        $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->findAll();

        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_hari', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Tahun $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFdaily_novalidate()
    {
        $currentYear = date('Y'); // Get the current year

        $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->where("status =", '0')->findAll();

        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_hari', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Tahun $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFdaily_validate()
    {
        $currentYear = date('Y'); // Get the current year

        $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->where("status =", '1')->findAll();

        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_hari', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Tahun $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFdaily_ditanggapi()
    {
        $currentYear = date('Y'); // Get the current year

        $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->where("status =", '2')->findAll();

        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_hari', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Tahun $currentYear.pdf", ['Attachment' => false]);
    }

    public function generatePDFdaily_ditolak()
    {
        $currentYear = date('Y'); // Get the current year

        $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->where("status =", 'ditolak')->findAll();

        // Load data into view if needed
        $data = [
            'title' => 'PDF Title',
            'content' => 'PDF Content',
            'pengaduan' => $pengaduan,
        ];

        // Load the view into a variable
        $html = view('generate_laporan/pdf_view_hari', $data);

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
        $dompdf->stream("Laporan Pengaduan Masyarakat Tahun $currentYear.pdf", ['Attachment' => false]);
    }

}
