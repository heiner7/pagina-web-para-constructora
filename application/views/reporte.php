<?php
	include 'plantilla.php';

	  if($this->session->flashdata("success"))
  {
    echo "<div class='alert alert-success' role='alert'>". $this->session->flashdata("success")."</div>";
  }


$info=$this->session->all_userdata();
echo validation_errors();
	

	$resultado = $this->mdl_proyectos->get_bitacora($info['cedula']);

	
	
	$pdf = new PDF('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'Proyecto',1,0,'C',1);
	$pdf->Cell(50,6,'Fecha',1,0,'C',1);
	$pdf->Cell(150,6,'Detalle cambio',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	foreach($resultado as $row)
	{
		$pdf->Cell(70,6,utf8_decode($row['nombreProyecto']),1,0,'C');
		$pdf->Cell(50,6,$row['fechaModificacion'],1,0,'C');
		$pdf->Cell(150,6,utf8_decode($row['detalleDeCambios']),1,1,'C');
	}
	$pdf->Output();
?>