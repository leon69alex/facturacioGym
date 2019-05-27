<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Remesa;
use App\Cuote;
use App\Client;

class RemesesController extends Controller
{
    public function index()
    {
        $remeses = Remesa::all();

        return view('remeses.index', compact('remeses'));
    }

    public function show($id)
    {
        $remesa = Remesa::findOrFail($id);
        
        return view('remeses.show', compact('remesa'));
    }

    public function generate()
    {
        //dd(auth()->user()->id);
        //CREEM UNA NOVA REMESA
        $remesa = new Remesa();

        $remesa->name = 'REMESA_'.date('dmY');
        $remesa->created_by = auth()->user()->id;
        $remesa->save();

        $clients_actius = Client::where('active', 1)->get();
        
        foreach($clients_actius as $client_actiu)
        {
            $remesa->clients()->attach($client_actiu);
        }

        return redirect()->back()->with('info', 'Remesa generada correctament');
    }

    public function generatePDF($id)
    {

        //dd("op");
        $remesa = Remesa::findOrFail($id);

        $import_total = 0.00;

        foreach ($remesa->clients as $client) {
            $import_total = $import_total + $client->cuote->import;
        }
        //dd($import_total);

        //$import = $remesa->clients()->cuote()->sum('import');

        $data = ['title' => $remesa->name, 'remesa'=> $remesa, 'import_total' => $import_total];
        $pdf = PDF::loadView('remeses.PDF', $data);
  
        return $pdf->download($remesa->name.'.pdf');

        //return view('remeses.PDF')->with($data);
    }
}
