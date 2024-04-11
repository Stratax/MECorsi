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

                    <div class="col-12 formatCode">Manifiesto de entrega, transporte <br> y recepción de residuos no peligrosos</div>
                </div>  
            </div>';
    $footer = '<p style="text-align:center;font-size:10px">
    Todos los derechos reservados CORSI. Se prohibe la reproducción total o parcial
    de este documento sin las autorizaciones correspondientes.
    </p>';

    $body = '
                <div style="text-align:center;padding:0px; margin-top:40px; font-size:9px;float:left">
                    <div class="col2-16">&nbsp;</div>
                    <div  class = "col2-4 l t">FOLIO</div>
                    <div  class = "l t r">MEOOO1/24</div>
                </div>
                <div class = "l t b" style="width:30px;height:700px;text-align:center;font-size:8px;background-color:#EEE;">
                    <div class = "b" style = "height:392px;">G<br>E<br>N<br>E<br>R<br>A<br>D<br>O<br>R</div>
                    <div class = "b" style = "height:150px;">T<br>R<br>A<br>N<br>S<br>P<br>O<br>R<br>T<br>I<br>S<br>T<br>A</div>
                    <div><br>D<br>E<br>S<br>T<br>I<br>N<br>O</div>
                </div>
                <div class= "r t l b" style="height:700px;text-align:center;font-size:9px;">
                    
                    <div class = "col2-8  r" style="text-align:left">RAZÓN SOCIAL DE LA EMPRESA</div>
                    <div style="padding-top:4px;float:left;text-align:left">RAZÓN SOCIAL DE LA EMPRESA</div>
                    <div class = "col2-3 t" style="text-align:left;">Domicilio y CP</div>
                    <div class = "t">Domicilio</div>
                    <div class = "col2-3 " style="text-align:left">Municipio</div>
                    <div class = "col2-10 t">MUN</div>
                    <div class = "col2-4 t " style="text-align:left">Estado</div>
                    <div class = "t">Estado</div>
                    <div class = "t" style="text-align:left;">TELÉFONO</div>

                    <div class = "col2-12 r t" style="height:35px;font-size:8px;">DESCRIPCIÓN ( Nombre del material y caracterizticas)</div>
                    <div class = "col2-6 r t" style="height:35px;font-size:8px;">
                        <div style="height:8px">CONTENEDOR</div>
                        <div class="t" style="width:81;height:20px">CANTIDAD</div>
                        <div class="t l" style="height:20px">TIPO</div>
                    </div>
                    
                    <div class = "col2-3 r t" style="height:35px;font-size:8px;">CANTIDAD TOTAL</div>
                    <div class = " t" style="height:35px;font-size:8px;">UNIDAD/VOL</div>
                    
                    ';
                    for($i = 0 ; $i<12 ; $i++){
                        $body = $body.'<div class = "col2-12 r t">&nbsp;</div>
                                       <div class = "col2-3 r t" style="font-size:8px;">E</div>
                                       <div class = "col2-3 r t" style="font-size:8px;">E</div>
                                       <div class = "col2-3 r t" style="font-size:8px;">E</div>
                                       <div class = "t" style="font-size:8px;">E</div>';
                    
                    }
                $body = $body.'
                        <div class = "t" style="font-size:6px;text-align:left">
                            <b>INSTRUCCIONES ESPECIALES E INFORMACIÓN ADICIONAL PARA EL MANEJO SEGURO:</b><br>
                            En caso de incendio uase polvo químico A B C (ver hoja de datos de seguridad)
                        </div>
                        <div class = "t" style="font-size:6px;text-align:left;height:60px">
                            <div class = "col2-4" style="float:left;height:40;">Nombre y firma del responsable:</div>
                            <div class = "col2-18 b" style="float:right;height:40;">&nbsp;</div>
                        </div>
                        
                        <div class="col2-8 r t" style="text-align:left">NOMBRE DE LA TRANSPORTADORA:</div>
                        <div class="t">JAIME PAEZ</div>
                        <div class = "col2-3 t" style="text-align:left;">Domicilio y CP</div>
                        <div class = "t">Domicilio</div>
                        <div class = "col2-3 " style="text-align:left">Municipio</div>
                        <div class = "col2-10 t">MUN</div>
                        <div class = "col2-4 t " style="text-align:left">Estado</div>
                        <div class = "t">Estado</div>

                        <div class = "t" style="font-size:6px;text-align:left;padding:0px">
                            <div class = "col2-24" style="float:left;height:10px;"><b>RECIBÍ LOS MATERIALES DESCRITOS EN LA ORDEN PARA SU TRANSPORTE:</b></div>
                            <div class = "col2-3">Nombre: </div>
                            <div class = "col2-11 b" style="font-size:8;text-align:center;">ANGEL MARES TELLEZ</div>
                            <div class = "col2-2">&nbsp;</div>
                            <div class = "col2-2">Cargo: </div>
                            <div class = "col2-5 b" style="font-size:8;text-align:center;">Operador</div>
                            <div class = "col2-3">Fecha de embarque: </div>
                            <div class = "col2-11 b" style="font-size:8;text-align:center;">10/10/2024</div>
                            <div class = "col2-2">&nbsp;</div>
                            <div class = "col2-2">Firma: </div>
                            <div class = "col2-5 b" style="font-size:8;text-align:center;">&nbsp;</div>
                        </div>

                        <div class = "t" style="margin-top:10px;height:30px;text-align:left;padding:0px">
                            Ruta hasta la entrega:
                        </div>
                        <div class = "col2-3 t r" style="text-align:left">TIPO DE VEHICULO:</div>
                        <div class = "col2-5 t" >TIPO DE VEHICULO:</div>
                        <div class = "col2-3 t r">&nbsp;</div>
                        <div class = "col2-3 t r" style="text-align:left;">NO. DE PLACAS: </div>
                        <div class = "t">NO. DE PLACAS: </div>

                        <div class="col2-8 r t" style="text-align:left">NOMBRE DE LA EMPRESA:</div>
                        <div class="t">COMERCIALIZADORA DE RESIDUOS INDUSTRIALES CORSI S.A. DE C.V.</div>
                        <div class = "col2-3 t" style="text-align:left;">Domicilio y CP</div>
                        <div class = "t">Domicilio</div>
                        <div class = "col2-3 " style="text-align:left">Municipio</div>
                        <div class = "col2-10 t">MUN</div>
                        <div class = "col2-4 t " style="text-align:left">Estado</div>
                        <div class = "t">Estado</div>

                        <div class = "t" style="font-size:6px;text-align:left;padding:0px">
                            <div class = "col2-24" style="float:left;height:10px;"><b>RECIBÍ LOS MATERIALES DESCRITOS:</b><br>Observaciones</div>
                            <div class = "col2-3">Nombre: </div>
                            <div class = "col2-11 b" style="font-size:8;text-align:center;">&nbsp;</div>
                            <div class = "col2-2">&nbsp;</div>
                            <div class = "col2-2">Cargo: </div>
                            <div class = "col2-5 b" style="font-size:8;text-align:center;">&nbsp;</div>
                            <div class = "col2-3">Fecha: </div>
                            <div class = "col2-11 b" style="font-size:8;text-align:center;">10/10/2024</div>
                            <div class = "col2-2">&nbsp;</div>
                            <div class = "col2-2">Firma: </div>
                            <div class = "col2-5 b" style="font-size:8;text-align:center;">&nbsp;</div>
                        </div>
                
                
                
                    </div>';
    
    
    
    $mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
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