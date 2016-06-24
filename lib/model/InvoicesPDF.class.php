<?php

    class InvoicesPDF 
    {
        
        function generate1($values)
        {
            $id_sale = $values['id_sale'];
            //echo $id_sale;die;
            $Sales = new Sales();
            $sale_data = $Sales ->getSalesInvoiceById($values);
            $sale_date =  $sale_data['date_sale'];
            $id_country_out = $sale_data['id_country_out'];
            $id_port_out = $sale_data['id_port_out'];
            $date_out = $sale_data['date_out'];
            $id_country_in = $sale_data['id_country_in'];
            $id_port_in = $sale_data['id_port_in'];
            $date_estimate_in = $sale_data['date_estimate_in'];
            $Plants = new Plants();
            $SalesPlantsDetail = new SalesPlantsDetail();
            $list_plants = $SalesPlantsDetail->getSalesListPlantsDetailBySale($id_sale);
            $client_name = $sale_data['client_name'];
            
            ob_clean();
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator("Marcos De Andrade");
            $pdf->SetAuthor('Marcos De Andrade');
            $pdf->SetTitle('Factura');
            $pdf->SetSubject('Factura');
            $pdf->SetKeywords('Factura, invoice, Coseinca');
            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // ---------------------------------------------------------

            // set font
            $pdf->SetFont('freeserif', '', 8);

            // add a page
            $pdf->AddPage();

            // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
            // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

            // create some HTML content
            $class_td = "border-bottom: 0px #ffffff !important;border-top: 0px !important; border-right: 0px; border-left: 0px";
            $html ='
            <table border="0" width="100%">
                <tr>
                    <td style="width:50%"></td>
                    <td>
                        <table border="1">
                            <tr>
                                <td style="background-color: #cccccc; font-size: 12px; text-align:center;font-weight: bolder;">Invoice Date</td>
                                <td style="background-color: #cccccc; font-size: 12px; text-align:center;font-weight: bolder;">Proforma Invoice #</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">'.$sale_date.'</td>
                                <td style="text-align:center;">'.$id_sale.'</td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
            <div></div>
            <table width="100%" border="0">
                <tr>
                    <td style="width:40%">
                        <table border="1" width="100%">
                            <tr>
                                <td style="background-color: #cccccc; font-size: 12px; text-align:center;font-weight: bolder;">Bill To</td>
                            </tr>
                            <tr>
                                <td>'.$client_name.'</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:20%"></td>
                    <td style="width:40%">
                        <table border="1" width="100%">
                            <tr>
                                <td style="background-color: #cccccc; font-size: 12px; text-align:center;font-weight: bolder;">Processing Plant</td>
                            </tr>';
            foreach ($list_plants as $plants) {
                $html.='
                            <tr>
                                <td>'.strtoupper($plants['name']).'</td>
                            </tr>';
            }

        $html.='
                        </table>
                    </td>
                </tr>
            </table>

            ';

            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');
            // reset pointer to the last page
            $pdf->lastPage();
            
            // ---------------------------------------------------------

            //Close and output PDF document
            $pdf->Output('factura.pdf', 'I');

            
            return $pdf;
        }
        
        
        
        
        
        
        
    }