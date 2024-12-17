<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RelatorioController extends Controller
{
    // Exibir relatório de clientes
    public function clientes()
    {
        $clientes = Cliente::all();
        return view('relatorios.clientes', compact('clientes'));
    }

    // Exportar clientes
    public function exportarClientes($format)
    {
        $clientes = Cliente::all();

        // Criando a planilha
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Cabeçalhos
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nome');
        $sheet->setCellValue('C1', 'Data de Nascimento');
        $sheet->setCellValue('D1', 'CPF');
        $sheet->setCellValue('E1', 'RG');
        $sheet->setCellValue('F1', 'Sexo');
        $sheet->setCellValue('G1', 'E-mail');

        // Dados
        $row = 2;
        foreach ($clientes as $cliente) {
            $sheet->setCellValue("A$row", $cliente->id);
            $sheet->setCellValue("B$row", $cliente->nome);
            $sheet->setCellValue("C$row", $cliente->data_nascimento);
            $sheet->setCellValue("D$row", $cliente->cpf);
            $sheet->setCellValue("E$row", $cliente->rg);
            $sheet->setCellValue("F$row", $cliente->sexo);
            $sheet->setCellValue("G$row", $cliente->email);
            $row++;
        }

        // Salvar e exportar
        switch ($format) {
            case 'csv':
                $writer = new Csv($spreadsheet);
                $filename = 'clientes.csv';
                break;
            case 'xlsx':
                $writer = new Xlsx($spreadsheet);
                $filename = 'clientes.xlsx';
                break;
            default:
                return back()->withErrors(['Formato de exportação inválido']);
        }

        $tempFile = tempnam(sys_get_temp_dir(), $filename);
        $writer->save($tempFile);

        return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
    }
}
