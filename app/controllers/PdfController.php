<?php

// Incluir la librería FPDF (asegurate de que la ruta sea correcta según tu estructura)
require_once('../libs/fpdf.php'); // Ajusta la ruta si es necesario

class PdfController {

    // Función que genera el PDF
    public function generatePDF() {
        // Crear una instancia de la clase FPDF
        $pdf = new FPDF();

        // Agregar una página al documento PDF
        $pdf->AddPage();

        // Establecer la fuente (Arial, negrita, tamaño 16)
        $pdf->SetFont('Arial', 'B', 16);

        // Agregar un título
        $pdf->Cell(40, 10, 'Hola Mundo!');

        // Salto de línea
        $pdf->Ln();

        // Establecer la fuente para el contenido
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, 'Este es un ejemplo de cómo generar un documento PDF con FPDF. Puedes agregar más contenido y personalizar el diseño según sea necesario.');

        // Salvar el archivo PDF en el navegador
        $pdf->Output('D', 'mi_documento.pdf');
    }
}

// Verificar si se hizo una petición para generar el PDF
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $pdfController = new PdfController();
    $pdfController->generatePDF();
}
?>
