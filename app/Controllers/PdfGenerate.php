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


    public function generate()
    {
        $data = $this->request->getPost();
        $currentYear = date('Y');
        $currentMonth = date('m');
        $currentDay = date('d');

        if ($data['waktu'] == 'hari') {
            if ($data['status'] == '0') {
                $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->where("status =", '0')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                    
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentDay $currentMonth $currentYear.pdf", ['Attachment' => false]);
            } elseif ($data['status'] == '1') {
                $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->where("status =", '1')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentDay $currentMonth $currentYear.pdf", ['Attachment' => false]);
            } elseif ($data['status'] == '2') {
                $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->where("status =", '2')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentDay $currentMonth $currentYear.pdf", ['Attachment' => false]);
            } elseif ($data['status'] == 'ditolak') {
                $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->where("status =", 'ditolak')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentDay $currentMonth $currentYear.pdf", ['Attachment' => false]);
            } elseif ($data['status'] == 'keseluruhan') {
                $pengaduan = $this->PengaduanModel->where('tanggal_pengaduan >= CURDATE()')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentDay $currentMonth $currentYear.pdf", ['Attachment' => false]);
            }
        } elseif ($data['waktu'] == 'bulan') {
            if ($data['status'] == '0') {
                $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '0')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentMonth $currentYear.pdf", ['Attachment' => false]);
            } elseif ($data['status'] == '1') {
                $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '1')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentMonth $currentYear.pdf", ['Attachment' => false]);
            } elseif ($data['status'] == '2') {
                $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '2')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentMonth $currentYear.pdf", ['Attachment' => false]);
            } elseif ($data['status'] == 'ditolak') {
                $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", 'ditolak')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentMonth $currentYear.pdf", ['Attachment' => false]);
            }
            elseif ($data['status'] == 'keseluruhan') {
                $pengaduan = $this->PengaduanModel->where("MONTH(tanggal_pengaduan) =", $currentMonth)->where("YEAR(tanggal_pengaduan) =", $currentYear)->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
                $dompdf->stream("Laporan Pengaduan Masyarakat $currentMonth $currentYear.pdf", ['Attachment' => false]);
            }
        } elseif ($data['waktu'] == 'tahun') {
            if ($data['status'] == '0') {
                $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '0')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
            } elseif ($data['status'] == '1') {
                $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '1')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
            } elseif ($data['status'] == '2') {
                $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", '2')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
            } elseif ($data['status'] == 'ditolak') {
                $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->where("status =", 'ditolak')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
            } elseif ($data['status'] == 'keseluruhan') {
                $pengaduan = $this->PengaduanModel->where("YEAR(tanggal_pengaduan) =", $currentYear)->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
        } elseif ($data['waktu'] == 'keseluruhan') {
            if ($data['status'] == '0') {
                $pengaduan = $this->PengaduanModel->where("status =", '0')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
            } elseif ($data['status'] == '1') {
                $pengaduan = $this->PengaduanModel->where("status =", '1')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
            } elseif ($data['status'] == '2') {
                $pengaduan = $this->PengaduanModel->where("status =", '2')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
            } elseif ($data['status'] == 'ditolak') {
                $pengaduan = $this->PengaduanModel->where("status =", 'ditolak')->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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
            } elseif ($data['status'] == 'keseluruhan') {
                $pengaduan = $this->PengaduanModel->findAll();

                $data = [
                    'title' => 'PDF Title',
                    'content' => 'PDF Content',
                    'tanggal' => $currentDay,
                    'bulan' => $currentMonth,
                    'tahun' => $currentYear,
                    'pengaduan' => $pengaduan,
                    'waktu' => $data['waktu'],
                    'status' => $data['status'],
                ];

                // Load the view into a variable
                $html = view('generate_laporan/pdf_generate', $data);

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


        // Load data into view if needed

    }
}
