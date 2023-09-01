<?php
class PdfReports extends CI_Controller
{
    public $user = [];
	public $data = [];

    public function __construct()
    {
        parent::__construct();
        require(APPPATH . 'third_party/fpdf/fpdf.php');
        $this->load->library("MPDF");
        // $this->load->model('visualization/ChartsModel', "VChartsModel");

        if ($this->session->has_userdata('user')) {
			$this->user = $this->session->userdata('user');
			$this->data['user'] = $this->user;
		}
    }

    public function index()
    {
        $pdf = new MPDF('P', 'mm', 'A4');
        $pdf->SetMargins(10,10,10);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        // $this->SetXY(10,75);
        

        $pdf->Cell(55, 5, 'Billing Address:', 0, 1, 'L');
        $pdf->AddPage();
        $pdf->Output();
    }

    public function html_pdf(){
        $this->load->view('exports/report', $this->data);
    }
}