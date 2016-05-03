<?php

	require_once('../model/model_cotizaciones.php');
	require_once('../../utilities/fpdf/fpdf.php');

	$m_cotizaciones = new model_cotizaciones();

	$codigo = $_POST['codigo'];

	/* PDF */
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 10);
	//$pdf->Image('../recursos/tienda.gif' , 10 ,8, 10 , 13,'GIF');
	$pdf->Cell(18, 10, '', 0);
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell(150, 10, 'Cotizacion Productos OfimaApp', 0);
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0);
	$pdf->Ln(15);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(15, 8, 'Item', 0);
	$pdf->Cell(80, 8, 'Nombre', 0);
	$pdf->Cell(30, 8, 'Cant / Ancho x Alto', 0);
	$pdf->Cell(45, 8, 'Caracteristicas', 0);
	$pdf->Cell(30, 8, 'Precio', 0);
	$pdf->Ln(8);
	$pdf->SetFont('Arial', '', 8);
	/* /PDF */

	$response_cotizaciones = $m_cotizaciones->consultarProductosCotizacion($codigo);
	if ($response_cotizaciones) {

		$item = 0;

		while ($row = mysql_fetch_array($response_cotizaciones)) {
			$response["Producto_Codigo"] = $row["CODIGO_PRODUCTO_COTIZACION"];
			$response["Producto_Descripcion"] = $row["DESCRIPCION_PRODUCTO"];
			$response["Producto_Precio"] = $row["PRECIO_PRODUCTO"];
			$response["Producto_Iva"] = $row["IVA_PRODUCTO"];
			$response["Producto_Cantidad"] = $row["CANTIDAD_PRODUCTO_COTIZACION"];
			$response["Producto_Ancho"] = $row["ANCHO_PRODUCTO_COTIZACION"];
			$response["Producto_Alto"] = $row["ALTO_PRODUCTO_COTIZACION"];
			$response["Producto_Subtotal"] = $row["SUBTOTAL_PRODUCTO_COTIZACION"];
			$response["Cotizacion_Subtotal"] = $row["SUBTOTAL_COTIZACION"];
			$response["Cotizacion_Total"] = $row["TOTAL_COTIZACION"];


			$response["Cotizacion_Codigo"] = $row["CODIGO_COTIZACION"];
			$response["Cotizacion_Fecha"] = $row["FECHA_COTIZACION"];
			$json[] = $response;

			$cot = $row["CODIGO_COTIZACION"];
			$cot_subtotal = $row["SUBTOTAL_COTIZACION"];
			$cot_total = $row["TOTAL_COTIZACION"];

			$item++;

			$pdf->Cell(15, 8, $item, 0);
			$pdf->Cell(80, 8, $row["DESCRIPCION_PRODUCTO"], 0);
			$pdf->Cell(30, 8, $row["CANTIDAD_PRODUCTO_COTIZACION"].' / '.$row["ANCHO_PRODUCTO_COTIZACION"].' x '.$row["ALTO_PRODUCTO_COTIZACION"], 0);
			$pdf->Cell(45, 8, 'Caracteristicas', 0);
			$pdf->Cell(30, 8, $row["SUBTOTAL_PRODUCTO_COTIZACION"], 0);
			$pdf->Ln(8);
		}

		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(18, 8, '', 0);
		$pdf->Cell(150, 8, 'Subtotal Cotizacion: $'.$cot_subtotal, 0);
		$pdf->Ln(8);
		$pdf->Cell(18, 8, '', 0);
		$pdf->Cell(150, 8, 'Total Cotizacion: $'.$cot_total, 0);

		$pdf->Output('cotizacion_'.$cot.'.pdf','D');

	}

?>