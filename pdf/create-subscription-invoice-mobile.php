<?php

// include autoloader

require_once 'dompdf/autoload.inc.php';



// reference the Dompdf namespace

use Dompdf\Dompdf;



// instantiate and use the dompdf class

$dompdf = new Dompdf();


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
  font-family: "Source Sans Pro", sans-serif;
  font-weight: 00;
  font-size: 11px;
  margin: 0;
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
  min-width: 460px;
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
  background: #02569F;
  border-right: 5px solid #FFFFFF;
  color: white;
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
  border-right: 3px solid #66BDA9;
}
table tbody td:last-child {
  border-right: none;
}
table tbody td.desc {
  text-align: left;
}
table tbody td.total {
  color: #66BDA9;
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
  background-color: #DAECF6;
  color: #555555;
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
  padding: 11px 10px;
  background-color: #02569F;
  color: #ffffff;
  font-weight: 600;
}
table.grand-total tbody .grand-total div span {
  display: inline-block;
  margin-right: 20px;
  width: 80px;
}

footer {
  margin-bottom: 15px;
  padding: 0 5px;
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


			<table border="0" cellspacing="0" cellpadding="0">
				<thead>
				<tr><td width="60%" height="50px"></td></tr>
                    <tr><td colspan=2><figure>
                    <img class="logo" src="'.$websiteLogo.'" style="max-width:200px" alt="digioffer">
                    </figure>
                    <td width="25%"><div class="company-info">
				<h2 class="title">Digioffer</h2>
				<div class="address">
					
					<p style="font-size:11px !important">
						'.$companyAddress.',<br>'.$companyCity.'<br>hello@digioffer.com.au
						
					</p>
				</div>
				
				
			</div></td>
                    </tr>
                    <tr><td height="40px"></td></tr>
                    
                    <tr>
                    	<td colspan="3">
                        
                        <div class="details clearfix">
				<div class="client left">
                	<p class="name">Invoiced To</p>
					<p>'.$buyerName.'</p>
					<p>'.$buyerAgency.'</p>
					<p>Phone: '.$buyerPhone.',</p>
					<a href="mailto:'.$buyerEmail.'">'.$buyerEmail.'</a>
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
						
						<th class="desc">Description</th>
						<th width="15%" class="unit">Unit price</th>
						<th class="total">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						
						<td class="desc"><h3>'.$description.'</td>
						<td class="unit">$'.$unitPrice.'</td>
						<td class="total">$'.$unitPrice.'</td>
					</tr>
					
				</tbody>
			</table>
			<div class="no-break">
				<table class="grand-total">
					<tbody>
						<tr class="total">
							<td class="qty"></td>
							<td class="desc"></td>
							<td class="unit">SUBTOTAL:</td>
							<td class="total" align="right" style="text-align:right">$'.$unitPrice.'</td>
						</tr>
						<tr class="total">
							<td class="qty"></td>
							<td class="desc"></td>
							<td class="unit">GST 10%:</td>
							<td class="total" align="right" style="text-align:right">$'.$gst.'</td>
						</tr>
						<tr class="total">
							<td class="grand-total" colspan="4" ><div style=padding-right:30px><span>GRAND TOTAL:</span>$'.$totalCharge.'</div></td>
						</tr>
						
						<tr>
						<td colspan=3>
						<p style="height:50px">&nbsp;</p>
							Invoice was created on a computer and is valid without the signature and seal.
	
						</td>
						</tr>
					</tbody>
				</table>
			
	



';

//echo $faxBody;exit;


$dompdf->loadHtml($faxBody);







//$dompdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>');



// (Optional) Setup the paper size and orientation

$dompdf->setPaper('A4', 'portrait');



// Render the HTML as PDF

$dompdf->render();







// Output the generated PDF to Browser

//$dompdf->stream();


file_put_contents('../invoices/invoice-'.$payId.'.pdf', $dompdf->output());



?>