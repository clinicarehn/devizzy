<?php
	header("Content-Type: text/html;charset=utf-8");
	
	$peticionAjax = true;
	require_once "configGenerales.php";
	require_once "mainModel.php";
	
	$insMainModel = new mainModel();

	include_once "dompdf/vendor/autoload.php";

	use Dompdf\Dompdf;

	$noFactura = $_GET['facturas_id'];

	//OBTENEMOS LOS DATOS DEL ENCABEZADO DE LA FACTURA
	$result = $insMainModel->getFactura($noFactura);
	
	//OBTENEMOS LAS FORMAS DE PAGO
	$result_metodos_pago = $insMainModel->getMetodoPagoFactura($noFactura);	
	
	$anulada = '';
	$logotipo = '';
	$firma_documento = '';

	//OBTENEMOS LOS DATOS DEL DETALLE DE FACTURA
	$result_factura_detalle = $insMainModel->getDetalleFactura($noFactura);								

	//CONSULTAMOS SI LA FACTURA ESTA EN PROFORMA
	$facturaTitle = "Factura";
	$proformaUso = 0;

	$resultProforma = $insMainModel->getConsultaFacturaProforma($noFactura);	
	if($resultProforma->num_rows>0){
		$consultaProforma = $resultProforma->fetch_assoc();
		$facturaTitle = "Factura Proforma";
		$proformaUso = 1;
	}

	if($result->num_rows>0){
		$consulta_registro = $result->fetch_assoc();	
		
		$logotipo = $consulta_registro['logotipo'];
		$firma_documento = $consulta_registro['firma_documento'];
		$no_factura = str_pad($consulta_registro['numero_factura'], $consulta_registro['relleno'], "0", STR_PAD_LEFT);

		if($consulta_registro['estado'] == 4){
			$anulada = '<img class="anulada" src="'.SERVERURL.'vistas/plantilla/img/anulado.png" alt="Anulada">';
		}

		ob_start();
		include(dirname('__FILE__').'/factura.php');
		$html = ob_get_clean();

		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		
		$dompdf->set_option('isRemoteEnabled', true);

		$dompdf->loadHtml($html);
		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('letter', 'portrait');
		// Render the HTML as PDF
		$dompdf->render();
		
		file_put_contents(dirname('__FILE__').'/facturas/factura_'.$no_factura.'.pdf', $dompdf->output());
		
		// Output the generated PDF to Browser
		$dompdf->stream('factura_'.$no_factura.'_'.$consulta_registro['cliente'].'.pdf',array('Attachment'=>0));
		
		exit;	
	}