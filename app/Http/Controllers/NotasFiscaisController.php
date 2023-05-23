<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\NotasFiscais;
use App\Models\NotaFiscalItens;
use App\Http\Requests\notasRequest;

class NotasFiscaisController extends Controller
{
    public function index()
    {
        $data = [];
        $data['records'] = Empresas::orderBy('id', 'DESC')->paginate(10);
        return view('dashboard')->with($data);
    }

    public function validateToArrayFile($filename = '', $delimiter = ';', $escape = '\\')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ";", $delimiter, $escape)) !== false) {

                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function store(notasRequest $request)
    {
        $request->validated([
            'csv' => 'required',
        ]);

        if ($csv = $request->file('csv')) {
            $fileDestionationPath = 'uploads/';
            $filecsv  = date('YmdHis') . "." . $csv->getClientOriginalExtension();
            $csv->move($fileDestionationPath, $filecsv);
            $filePath = $fileDestionationPath . $filecsv;

            $sales = $this->validateToArrayFile($filePath);

            foreach ($sales as $key =>  $sale) {
                //pular cabeçalho 
                if ($key == 0) continue;

                $cnpj = $sale['cnpj'];

                //registrar empresa 
                $empresa = [
                    'razao_social' => $sale['razão social'],
                    'cnpj' => $cnpj,
                ];
                $empresa = Empresas::create($empresa);

                //registrar nota fiscal 
                $notaFiscal = [
                    'empresa_id' => $empresa->id,
                    'numero' => $sale['numero nf'],
                    'total' => $sale['valor']
                ];
                $notaFiscal = NotasFiscais::create($notaFiscal);

                //registrar item de nota fiscal 
                $notaFiscalItem = [
                    'notas_fiscais_id' => $notaFiscal->id,
                    'valor' => $sale['valor unitário'],
                    'quantidade' => $sale['quantidade'],
                    'produto' => $sale['produto'],
                ];
                NotaFiscalItens::create($notaFiscalItem);
            }
            return redirect()->back()->with('message', 'Notas fiscais cadastradas com sucesso');
        }
    }
}
