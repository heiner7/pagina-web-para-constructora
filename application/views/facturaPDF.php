<?php
	include 'plantilla.php';

	  if($this->session->flashdata("success"))
  {
    echo "<div class='alert alert-success' role='alert'>". $this->session->flashdata("success")."</div>";
  }


$id=$_GET['idDetallePago'];
	

	$resultado = $this->mdl_proyectos->get_facturaPDF($id);
	$proyecto = $this->mdl_proyectos->get_proyectos($resultado['idProyecto']);
	
	
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	// Encabezado de la factura
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(190, 10, "Factura", 0, 2, "C");
	$pdf->SetFont('Arial','B',10);
	$pdf->Ln(240);
	$pdf->MultiCell(190,5, "Numero de factura: ".$resultado['idDetallePago']."\n"."Fecha: ".$resultado['fechaRegistro'], 0, "C", false);
	
		
	// Datos del reporte
	$pdf->SetFont('Arial','B',12);
	$top_datos=25;
	$pdf->SetXY(50, $top_datos);
	$pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(190, //posición X
	9, //posición Y

	"Nombre: ".$resultado['nombrePersona']."\n".
	"Primer Apellido: ".$resultado['apellido']."\n".
	"Segundo Apellido: ".$resultado['apellido2']."\n".
	"Cedula: ".$resultado['cedulaUsuario']."\n",
	);

	//Del proyecto

	// Datos del proyecto
	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(125, $top_datos);
	$pdf->Cell(190, 10, "Datos del proyecto:", 0, 2, "J");
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(190, //posición X
	9, //posición Y

	"Nombre proyecto: ".$proyecto['nombreProyecto']."\n".
	"Identificador proyecto: ".$proyecto['idProyecto']."\n".
	"Fecha inicio proyecto: ".$proyecto['fechaInicio']."\n",
	
	);

	// Datos de la factura
	$pdf->SetFont('Arial','B',12);
	$top_datos=115;
	$pdf->SetXY(85, $top_datos);
	$pdf->Cell(190, 10, "Datos de la factura:", 0, 2, "J");
	$pdf->SetFont('Arial','',9);
	$pdf->MultiCell(190, //posición X
	9, //posición Y

	"Monto total: ".$resultado['montoTotal']."\n".
	"Monto deber: ".$resultado['montoDeber']."\n".
	"Mes cancelar: ".$resultado['mesCancelar']."\n".
	"Fecha Registro: ".$resultado['fechaRegistro']."\n".
	"Descripcion: ".$resultado['descripcion']."\n".
	"Presupuesto: ".$resultado['saldo']."\n",
	);

	//De la factura

	$pdf->Output();
?>