<?php

require('fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include '../../modelo/conexion.php';//llamamos a la conexion BD

      $sentencia = "SELECT * from empresa";//traemos datos de la empresa desde BD
      $consulta= $conexPdo->prepare($sentencia);
      $consulta->execute();

      $datosEmpresa= $consulta->fetch();


      $this->Image('logo.png', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode($datosEmpresa['nombre']), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : ".$datosEmpresa['ubicacion']), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : ".$datosEmpresa['telefono']), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : ".$datosEmpresa['ruc']), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 95, 189);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE CARGOS"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(125, 173, 221); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(20, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(170, 10, utf8_decode('CARGO'), 1, 1, 'C', 1);
      //$this->Cell(60, 10, utf8_decode('APELLIDO'), 1, 0, 'C', 1);
      //$this->Cell(50, 10, utf8_decode('USUARIO'), 1, 1, 'C', 1);
      //$this->Cell(70, 10, utf8_decode('ENTRADA'), 1, 0, 'C', 1);
      //$this->Cell(25, 10, utf8_decode('SALIDA'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include '../../modelo/conexion.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$esentencia= "SELECT * FROM cargo";
$econsulta= $conexPdo->prepare($esentencia);
$econsulta->execute();

$datos= $econsulta->fetchAll();

$i = $i + 1;
foreach ($datos as $dato) {
   $pdf->Cell(20, 10, utf8_decode($dato['id_cargo']), 1, 0, 'C', 0);
   $pdf->Cell(170, 10, utf8_decode($dato['nombre']), 1, 1, 'C', 0);
   //$pdf->Cell(60, 10, utf8_decode($dato['apellido']), 1, 0, 'C', 0);
   //$pdf->Cell(50, 10, utf8_decode($dato['usuario']), 1, 1, 'C', 0);
   //$pdf->Cell(70, 10, utf8_decode($dato['entrada']), 1, 0, 'C', 0);
   //$pdf->Cell(25, 10, utf8_decode($dato['salida']), 1, 1, 'C', 0);
}



$pdf->Output('reporteCargos.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)