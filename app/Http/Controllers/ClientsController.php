<?php

namespace App\Http\Controllers;

use App\Client;
use App\Cuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\CreateClientRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientsImport;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('cuote')->get();
        
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuotes = Cuote::all();

        return view('clients.create', compact('cuotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        if($request->has('active'))
        {
            $request['active'] = true;
        }
        
        $client = Client::create($request->all());

        return redirect()->route('clients.index')->with('info', 'El client s\'ha creat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);

        return $client;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $cuotes = Cuote::all();

        return view('clients.edit', compact('client', 'cuotes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        if($request->has('active'))
        {
            $request['active'] = true;
        }
        
        $client->update($request->all());

        return redirect()->route('clients.index')->with('info', 'El client s\'ha actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Send an email to the specified client
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendEmailImpagament($id){

        $client = Client::findOrFail($id);

        //$name = 'Krunal';
        Mail::to($client->email)->send(new SendEmail($client));
   
        return redirect()->back()->with('info', 'El missatge s\'ha enviat correctament');


    }

    public function switchClients(Request $request){
        //return response()->json($request);

        if($request->ajax()){
            $client = Client::findOrFail($request->id);

            if($client->active){
                $client->active = false;
            } else {
                $client->active = true;
            }

            $client->save();

            return response()->json(['success'=> $client->active]);
        }
    }

    public function importClients() 
    {
        //dd(scandir('storage/import'));
        Excel::import(new ClientsImport, 'clients.xlsx', 'import');
        //dd(scandir('storage/import'));
        //dd("HOP");
        return redirect()->back()->with('info', 'Clients importats correctament');
    }
}
