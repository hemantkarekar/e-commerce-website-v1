<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('components/_head') ?>
    <?php $this->load->view('components/_common_css') ?>
    <title>Document</title>
    <style>
        #exportDOM>* {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('components/_nav_ecom') ?>
    </header>
    <main>
        <div class="container">
            <div class="row m-0 justify-content-center">
                <div class="col-8">
                    <div id="exportDOM">
                        <div class="mb-3">
                            <div class="row m-0 justify-content-between align-items-center">
                                <div class="col-auto">
                                    <img src="<?= base_url('assets/logo.png') ?>" alt="Logo" height="30">
                                </div>
                                <div class="col-auto">
                                    <strong>Tax Invoice/Bill of Supply/Cash Memo</strong>
                                    <br>
                                    (Original for Recipient)
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row m-0 justify-content-between">
                                <div class="col-6 mb-3">
                                    <div class="card h-100 ">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <strong>Sold By:</strong><br>
                                                <span>Darshita Aashiyana Private Limited</span><br>
                                                *Unit No. 1, Khewat/ Khata No: 373/ 400 Mustatil
                                                No 31, Village Taoru,<br>
                                                Tehsil Taoru, District Mewat,<br>
                                                On Bilaspur Taoru Road<br>
                                                <span>Mewat, Haryana</span>, <span>122105</span><br>
                                                <span>IN</span>
                                            </div>
                                            <div class="">
                                                <strong>PAN No:&nbsp;</strong><span>AAFCD6883Q</span><br>
                                                <strong>GST Registration No:</strong><br><span>06AAFCD6883Q1ZU</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="billing__address mb-3">
                                                <strong>Billing Address:</strong><br>
                                                <span>Darshita Aashiyana Private Limited</span><br>
                                                *Unit No. 1, Khewat/ Khata No: 373/ 400 Mustatil
                                                No 31, Village Taoru,<br>
                                                Tehsil Taoru, District Mewat,<br>
                                                On Bilaspur Taoru Road<br>
                                                <span>Mewat, Haryana</span>, <span>122105</span><br>
                                                <span>IN</span>
                                            </div>
                                            <div class="shippping__address mb-3">
                                                <strong>Shipping Address:</strong><br>
                                                <span>Darshita Aashiyana Private Limited</span><br>
                                                *Unit No. 1, Khewat/ Khata No: 373/ 400 Mustatil
                                                No 31, Village Taoru,<br>
                                                Tehsil Taoru, District Mewat,<br>
                                                On Bilaspur Taoru Road<br>
                                                <span>Mewat, Haryana</span>, <span>122105</span><br>
                                                <span>IN</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Header 1</th>
                                                    <th>Header 2</th>
                                                    <th>Header 3</th>
                                                    <th>Header 4</th>
                                                </tr>
                                                <?php for ($i = 0; $i < 2; $i++) : ?>
                                                    <tr>
                                                        <?php for ($j = 0; $j < 4; $j++) : ?>
                                                            <td>Cell <?= $i . " " . $j ?></td>
                                                        <?php endfor ?>
                                                    </tr>
                                                <?php endfor ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button onclick="generatePDF()">Generate</button>
                </div>
            </div>
    </main>
    <footer>
        <?php $this->load->view('components/_common_footer') ?>
    </footer>
    <?php $this->load->view('components/_common_js') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function generatePDF() {
            // Choose the element id which you want to export.
            var element = document.getElementById('exportDOM');
            element.style.width = '700px';
            element.style.height = '900px';

            var opt = {
                margin: [5, 10, 5, 10],
                filename: '1.pdf',
                image: {
                    type: 'jpeg',
                    quality: 10
                },
                pagebreak: { avoid: "tr", mode: "css"},
                html2canvas: {
                    dpi: 300,
                    scale: 4,
                    letterRendering: true,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>

</html>