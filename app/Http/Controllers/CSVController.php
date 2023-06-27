<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ResultadoProcessamento;

use function PHPSTORM_META\map;

class CSVController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function processamento(Request $request) 
    {
        $arquivoCSV = $request->input('csv');
        // Verifica se o arquivo foi enviado
        if ($arquivoCSV) {
        // Define o caminho do arquivo temporário
        $caminhoTemp = $_SERVER['DOCUMENT_ROOT'];
        $caminhoTemp= $caminhoTemp . '/' . $arquivoCSV;
        // Lê o conteúdo do arquivo CSV
        $conteudo = File::get($caminhoTemp);
        $linhas = explode("\n", $conteudo);
        $dadosProcessados = array_map(function ($item)
            {
                return explode(";", $item);

            }, $linhas);
        }
        dd($dadosProcessados);
    }
     
}
