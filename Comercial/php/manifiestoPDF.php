<?php
    require_once("../../vendor/autoload.php");

    $header = '
        <div class="col-12 rowcnt" style="font-size:10px;border: 1px solid black;">
            <div class="col-4 logo" style="border-right:1px solid black;"></div>
                <div class="col-8" style="text-align:center;">                        
                    <div class="col-4 " style="border:1px solid black;border-right:0px;"><b>Version:</b> </div>
                    <div class="col-4 " style="border:1px solid black;border-right:0px;"><b>Emisión:</b> </div>
                    <div class="col-4 " style="border:1px solid black;"><b>Página</b></div>
                    <div class="col-4 " style="border:1px solid black;border-top: 0px;border-right:0px;"><b>01</b></div>
                    <div class="col-4 " style="border:1px solid black;border-top: 0px;border-right:0px;"><b>02/01/2023</b></div>
                    <div class="col-4 " style="border:1px solid black;border-top: 0px;"><b>1 de 1</b></div>

                    <div class="col-12 formatCode">Solicitud de Servicio<br>CSC-CM-FO-11</div>
                </div>  
            </div>';
    $footer = '<p style="text-align:center;font-size:10px">
    Todos los derechos reservados CORSI. Se prohibe la reproducción total o parcial
    de este documento sin las autorizaciones correspondientes.
    </p>';

    $body = '<div class = "col-12 rowcnt" style="margin-top:15px;font-size:12px"> 
                <div class = "col-10" style = "text-align:right">
                    Fecha de Solicitud:
                </div>
                <div class = "col-2" style="border:1px solid black; text-align:center"> 
                    10/10/2023 
                </div>
            </div>

            <div class = "col-12 rowcnt" style="text-align:center;font-size:12px"> 
                <div class = "col-12" style = "background-color:#EEE;margin:5px">
                    DATOS DE RECOLECCIÓN
                </div>
                <div class = "col-4" style="margin-top:3px;text-align:left"> 
                    Fecha de recolección:  
                </div>
                <div class = "col-2" style="margin-top:3px;text-align:center;border:1px solid black"> 
                    10/10/2024  
                </div>
                <div class = "col-1">&nbsp;</div>
                <div class = "col-3" style="text-align:left"> 
                    Número de manifiesto:  
                </div>
                <div class = "col-2" style="text-align:center;border:1px solid black"> 
                    C1483/24  
                </div>
                <div class = "col-4" style="margin-top:10px;text-align:left"> 
                    Generador:   
                </div>
                <div class = "col-8" style="text-align:center;border-bottom:2px solid black"> 
                    GENERADOR  
                </div>
                <div class = "col-4" style="margin-top:10px;text-align:left"> 
                    Domicilio de recolección:  
                </div>
                <div class = "col-8" style="text-align:center;border-bottom:2px solid black"> 
                    DOM  
                </div>
                <div class = "col-4" style="margin-top:10px;text-align:left"> 
                    Contacto:  
                </div>
                <div class = "col-8" style="text-align:center;border-bottom:2px solid black"> 
                    CONTACTO  
                </div>
                <div class = "col-4" style="margin-top:10px;text-align:left"> 
                    Material a recolectar:  
                </div>
                <div class = "col-8" style="text-align:center;border-bottom:2px solid black"> 
                    MANEJO ESPECIAL  
                </div>
            </div>

            <div class = "col-12 rowcnt" style="text-align:center;font-size:12px"> 
                <div class = "col-12" style = "background-color:#EEE;margin:5px">
                    TRANSPORTISTA
                </div>
                <div class = "col-4" style="margin-top:10px;text-align:left"> 
                    Transportista:   
                </div>
                <div class = "col-8" style="text-align:center;border-bottom:2px solid black"> 
                    TRANSPORTISTA  
                </div>
                <div class = "col-4" style="margin-top:10px;text-align:left"> 
                    Operador:  
                </div>
                <div class = "col-8" style="text-align:center;border-bottom:2px solid black"> 
                    DOM  
                </div>
                <div class = "col-4" style="margin-top:7px;text-align:left"> 
                    Tipo de Unidad 1:  
                </div>
                <div class = "col-4" style="text-align:center;border-bottom:2px solid black"> 
                    10/10/2024  
                </div>
                <div class = "col-1">&nbsp;</div>
                <div class = "col-1" style="text-align:left"> 
                    Placas:  
                </div>
                <div class = "col-2" style="text-align:center;border-bottom:2px solid black"> 
                    C1483/24  
                </div>
                <div class = "col-4" style="margin-top:7px;text-align:left"> 
                    Tipo de Unidad 2:  
                </div>
                <div class = "col-4" style="text-align:center;border-bottom:2px solid black"> 
                    10/10/2024  
                </div>
                <div class = "col-1">&nbsp;</div>
                <div class = "col-1" style="text-align:left"> 
                    Placas:  
                </div>
                <div class = "col-2" style="text-align:center;border-bottom:2px solid black"> 
                    C1483/24  
                </div>
                
                
                
            </div>';
    
    
    
    $mpdf = new \Mpdf\Mpdf();
    $css = file_get_contents("../Style/pdfSheet.css");
    $mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
    
    //$mpdf->SetHTMLHeader($header);
    $mpdf->WriteHTML($header);
    $mpdf->SetHTMLFooter($footer);
    $mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output("doc1.pdf",\Mpdf\Output\Destination::INLINE);

     // 
                // <div class="col-12 l1"><b>FORMATO DE PRE-FACTURA</b></div>
                // <div class="col-12 l2">CSC-CM-FO-16</div>
    
?>