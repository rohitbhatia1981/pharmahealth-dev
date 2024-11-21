<?php error_reporting(0);
include "../private/settings.php";

if ($_SESSION['sess_patient_id']!="" || $_SESSION['user_id']!="")
{
	$payId=decryptId($_GET['aid']);

$sqlPayment="SELECT payment_id, payment_date, payment_amount,payment_pres_id,payment_status,patient_first_name,patient_middle_name,patient_last_name,patient_phone,patient_email,patient_address1,patient_address2,patient_city,patient_postcode from tbl_payments,tbl_patients WHERE patient_id=payment_patient_id and payment_id='".$database->filter($payId)."'";

if ($_SESSION['sess_patient_id']!="")
$sqlPayment.=" and payment_patient_id='".$database->filter($_SESSION['sess_patient_id'])."'"; 



$resPayment=$database->get_results($sqlPayment);
if (count($resPayment)>0)
$rowPayment=$resPayment[0];
else
exit;



}
$websiteLogo=PATH."images/logo.png";
$companyAddress="14/2G Docklands Business Centre <br>
					10-16 Tiller Road <br>
					London <br>
					E14 8PX<br>
					<font style='font-weight:bold !important'>VAT No</font>: 435247009";
					
$buyerName=$rowPayment['patient_first_name']." ".$rowPayment['patient_middle_name']." ".$rowPayment['patient_last_name']; 
$buyerAddress=fnPatientAddressStr($rowPayment['patient_address1'],$rowPayment['patient_address2'],$rowPayment['patient_city'],"<br>".$rowPayment['patient_postcode']);
$buyerPhone=$rowPayment['patient_phone'];
$buyerEmail=$rowPayment['patient_email'];

$faxBody='<style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline;
}

html {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}

q, blockquote {
  quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}

a img {
  border: none;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
  display: block;
}

body {
  background-color:#fff;
  font-family: "Source Sans Pro", sans-serif;
  font-weight: 00;
  font-size: 11px;
  margin: 80px 20px;
  padding: 0;
  color: #555555;
}
body a {
  text-decoration: none;
  color: inherit;
}
body a:hover {
  color: inherit;
  opacity: 0.7;
}
body .container {
  min-width: 100%;
  margin: 0 auto;
  padding: 0 20px;
}
body .clearfix:after {
  content: "";
  display: table;
  clear: both;
}
body .left {
  float: left;
}
body .right {
  float: right;
}
body .helper {
  display: inline-block;
  height: 100%;
  vertical-align: middle;
}
body .no-break {
  page-break-inside: avoid;
}

header {
  margin-top: 15px;
  margin-bottom: 45px;
}
header figure {
  float: left;
  margin-right: 10px;
  width: 65px;
  height: 70px;
 
  text-align: center;
}
header figure img {
  margin-top: 10px;
}
header .company-info {
  float: right;
  color: #446AA5;
  line-height: 24px;
  font-size:14px;
  padding-right:20px;
}
header .company-info .address, header .company-info .phone, header .company-info .email {
  position: relative;
  font-size:12px;
  padding-right:20px;
}
header .company-info .address img, header .company-info .phone img {
  margin-top: 2px;
  padding-right:20px;
}
header .company-info .email img {
  margin-top: 3px;
}
header .company-info .title {
  color: #446AA5;
  font-weight: 400;
  font-size: 24px;
}
header .company-info .icon {
  position: absolute;
  left: -15px;
  top: 1px;
  width: 10px;
  height: 10px;
  background-color: #66BDA9;
  text-align: center;
  line-height: 0;
}

.details {
  min-width: 440px;
  margin-bottom: 40px;
  padding: 5px 10px;
  background-color: #F0F3F6;
  color: #000;
  line-height: 20px;
}
.details .client {
  width: 50%;
}
.details .client .name {
  font-size: 1.16666666666667em;
  font-weight: 600;
}
.details .data {
  width: 50%;
  font-weight: 600;
  text-align: right;
}
.details .title {
  margin-bottom: 5px;
  font-size: 1.33333333333333em;
  text-transform: uppercase;
}
table {
  width: 100%;
  margin-bottom: 20px;
  table-layout: fixed;
  border-collapse: collapse;
  border-spacing: 0;
}
table .qty, table .unit, table .total {
  width: 15%;
}
table .desc {
  width: 55%;
}
table thead {
  display: table-header-group;
  vertical-align: middle;
  border-color: inherit;
}
table thead th {
  padding: 7px 10px;
 
  background: #C3CDEA;
  border-right: 5px solid #FFFFFF;
  color: #000;
  text-align: center;
  font-weight: 400;
  text-transform: uppercase;
}
table thead th:last-child {
  border-right: none;
}
table tbody tr:first-child td {
  border-top: 10px solid #ffffff;
}
table tbody td {
  padding: 10px 10px;
  text-align: center;
  border-right: 1px solid #C3CDEA;
}
table tbody td:last-child {
  border-right: none;
}
table tbody td.desc {
  text-align: left;
}
table tbody td.total {
  color: #000;
  font-weight: 600;
  text-align: right;
}
table tbody h3 {
  margin-bottom: 5px;
  color: #000;
  font-weight: 500;
  font-size:16px;
}
table.grand-total {
  margin-bottom: 50px;
}
table.grand-total tbody tr td {
  padding: 0px 20px 22px;
  border: none;
  background-color: #AAB8DF;
  color: #000;
  font-weight: 300;
  text-align: left;
}
table.grand-total tbody tr:first-child td {
  padding-top: 12px;
  
}
table.grand-total tbody tr:last-child td {
  background-color: transparent;
}
table.grand-total tbody .grand-total {
  padding: 0;
}
table.grand-total tbody .grand-total div {
  float: right;
  padding: 11px 15px;
 
  color: #000;
  font-weight: 600;
}
table.grand-total tbody .grand-total div span {
  display: inline-block;
  margin-right: 20px;
  width: 90px;
}
@page {
  margin: 100px 50px;
}
footer {
  position: fixed;
  bottom: 0px;
  left: 20;
  right: 0;
  height: 50px;
  text-align: center;
  font-size: 11px !important;
  color: #555555;
  width: 100%;
  border-top: 1px solid #C3CDEA;
}
footer .thanks {
  margin-bottom: 40px;
  color: #02569F;
  font-size: 1.16666666666667em;
  font-weight: 600;
}
footer .notice {
  margin-bottom: 15px;
}
footer .end {
  padding-top: 5px;
  border-top: 2px solid #66BDA9;
  text-align: center;
}

	</style>


			<table border="0" cellspacing="0" cellpadding="0" width="100%">
				<thead>
				<tr><td width="60%" height="50px"></td></tr>
                    <tr><td colspan=2><figure>
                    <img class="logo" src="'.$websiteLogo.'" style="max-width:200px;padding-left:20px" alt="Pharma Health">
                    </figure>
                    <td width="25%"><div class="company-info">
				<h2 class="title">Pharma Health <br>T/A Pro UK Health Ltd</h2>
				<div class="address">
					
					<p style="font-size:11px !important">
						'.$companyAddress.'<br>admin@pharma-health.co.uk
						
					</p>
				</div>
				
				
			</div></td>
                    </tr>
                    <tr><td height="40px"></td></tr>
                    
                    <tr>
                    	<td colspan="3">
                        
                        <div class="details clearfix">
				<div class="client left">
                	
					<p>'.$buyerName.'</p>
					<p>'.$buyerAddress.'</p>
					
				</div>
				<div class="data right">
					<div class="title">Invoice #'.$payId.'</div>
					<div class="date">
						Invoice Date: '.date('d/m/Y').'<br><br>
						<h3 style="font-size:30px; color:#02569F">PAID</h3>
					</div>
				</div>
			</div>
                        
                        </td>
                     </tr>
                    
                    
				<tr><td height="40px"></td></tr>
					<tr>
						
						<th class="desc" style="font-size:14px !important">Description</th>
						<th width="25%" class="unit" style="font-size:14px !important">Pack Quantity</th>
						<th class="total" style="font-size:14px !important">Total</th>
					</tr>
				</thead>
				<tbody>';
				
				$sqlMedicine="select * from tbl_prescription_medicine where pm_pres_id='".$database->filter($rowPayment['payment_pres_id'])."'";
				$resMedicine=$database->get_results($sqlMedicine);
					for ($m=0;$m<count($resMedicine);$m++)
						{
							$rowMedicine=$resMedicine[$m];
							$description=$rowMedicine['pm_med']."<br>Strength: ".$rowMedicine['pm_med_strength'].", Packsize: ". $rowMedicine['pm_med_packsize'];
							$packQuantity=$rowMedicine['pm_med_qty'];
							$unitPrice=CURRENCY.$rowMedicine['pm_med_price'];
							$totalCharge=$rowPayment['payment_amount'];
				
						$faxBody.='<tr>
								
								<td class="desc"><h3>'.$description.'</td>
								<td class="unit">'.$packQuantity.'</td>
								<td class="total">'.$unitPrice.'</td>
							</tr>';
						}
						
						if ($rowPayment['pres_same_day']==1) {
										
                          $faxBody.='<tr><td></td><td>Same day service</td><td>'.CURRENCY.$rowPayment['payment_sameday'].'</td></tr>';
                                            
						}
						$faxBody.='<tr><td colspan=2></td><td style="text-align:right !important; color:#02569F !important"><strong>NET TOTAL:</strong> '.CURRENCY.$totalCharge.'</td></tr>';
							
			$faxBody.='</tbody>
			</table>
			<div class="no-break">
				
				<br><br>
	
	<footer>Company Registration No: 13323297. Registered Office: 14/2G Docklands Business Centre, 10-16 Tiller Road, London, E14 8PX, United Kingdom.</footer>
	


';

//echo $faxBody;exit;

require_once 'dompdf/autoload.inc.php';



// reference the Dompdf namespace

use Dompdf\Dompdf;



// instantiate and use the dompdf class

$dompdf = new Dompdf();

//echo $faxBody;exit;



$dompdf->loadHtml($faxBody);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();


// Output the generated PDF to Browser

//$dompdf->stream();




file_put_contents(PATH.'invoices/invoice-'.$payId.'.pdf', $dompdf->output());

$pdfFilePath = PATH.'invoices/invoice-'.$payId.'.pdf'; // Replace with the actual path to your generated PDF.

// Set the HTTP headers to trigger the download.
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="invoice-'.$payId.'.pdf"'); // You can change the filename as needed.

// Output the PDF content to the browser.
readfile($pdfFilePath);
unlink ($pdfFilePath);



exit;


?>