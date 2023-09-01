<?php
class MPDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('https://www.sociomark.in/assets/img/logo/sc-colored-horizontal.png', 10, 6, null, 6);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 13);
        // $this->Ln(12);
        $this->Cell(90, 5, '', 0, 0);
        $this->Cell(100, 6, "Tax Invoice/Bill of Supply/Cash Memo", 0, 1, 'R');
        $this->Cell(90, 5, '', 0, 0);
        $this->SetFont('Arial', '', 12);
        $this->Cell(100, 6, "(Original for Recipient)", 0, 1, 'R');
        $this->Cell(190, 5, '', 0, 1);


        $this->SetFont('Arial', 'B', 11);
        $this->Cell(95, 7, "Sold By:", 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->MultiCell(95, 4, "Darshita Aashiyana Private Limited\n*Unit No. 1, Khewat/ Khata No: 373/ 400 Mustatil\nNo 31,, Village Taoru, Tehsil Taoru, District\nMewat,, On Bilaspur Taoru Road\nMewat, Haryana, 122105\nIN", 0, 'L');
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(95, 2, "", 0, 1, 'L');
        $this->Cell(18, 5, 'PAN No.:', 0, 0, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(77, 5, "Billing Address:", 0, 1, 'L');
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(40, 5, 'GST Registration No.:', 0, 0, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(55, 5, 'Billing Address:', 0, 1, 'L');

        $this->SetXY(105, 27);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(95, 7, "Billing Address:", 0, 1, 'R');
        $this->SetFont('Arial', '', 10);
        $this->SetXY(105, 34);
        $this->MultiCell(95, 4, "Darshita Aashiyana Private Limited\n*Unit No. 1, Khewat/ Khata No: 373/ 400 Mustatil\nNo 31,, Village Taoru, Tehsil Taoru, District\nMewat,, On Bilaspur Taoru Road\nMewat, Haryana, 122105\nIN", 0, 'R');

        $this->SetXY(105, 65);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(95, 7, "Shipping Address:", 0, 1, 'R');
        $this->SetFont('Arial', '', 10);
        $this->SetXY(105, 72);
        $this->MultiCell(95, 4, "Darshita Aashiyana Private Limited\n*Unit No. 1, Khewat/ Khata No: 373/ 400 Mustatil\nNo 31,, Village Taoru, Tehsil Taoru, District\nMewat,, On Bilaspur Taoru Road\nMewat, Haryana, 122105\nIN", 0, 'R');
        $this->Line(200, 110, 10, 110);

        $this->SetFont('Arial', 'B', 11);
        $this->Cell(30, 5, 'Order Number.:', 0, 0, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(65, 5, "Billing Address:", 0, 1, 'L');
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(23, 5, 'Order Date:', 0, 0, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(72, 5, 'Billing Address:', 0, 1, 'L');

        $this->SetXY(105, 172);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(30, 5, 'Order Number.:', 0, 0, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(65, 5, "Billing Address:", 0, 1, 'L');
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(23, 5, 'Order Date:', 0, 0, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(72, 5, 'Billing Address:', 0, 1, 'L');

        $this->Cell(190, 5, '', 0, 1);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-25);
        // Arial italic 8
        $this->SetFont('Arial', '', 8);
        $this->SetTextColor('150', '150', '150');
        $this->MultiCell(190, 3, "*ASSPL-Amazon Seller Services Pvt. Ltd., ARIPL-Amazon Retail India Pvt. Ltd. (only where Amazon Retail India Pvt. Ltd. fulfillment center is co-located)
        Customers desirous of availing input GST credit are requested to create a Business account and purchase on Amazon.in/business from Business eligible offers
        \nPlease note that this invoice is not a demand for payment", 0, 'C');
        $this->SetFont('Courier', '', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . 'of {nb}', 0, 0, 'R');
    }
}
