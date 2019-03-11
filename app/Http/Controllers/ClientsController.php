<?php

namespace App\Http\Controllers;

use App\Client;
use App\Cuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$clients = Client::all();

        $key = 'clients';

        /* $key = "clients.page.".request('page', 1);
        //$key = "clients.page.1";
        //dd($key);*/

        if(Cache::has($key))
        {
            $clients = Cache::get($key);
        }
        else
        {
            //$missatges = DB::table('messages')->get();

            //Utilitzant models.
            $clients = Client::all();
                            //->orderBy('id', request('sorted', 'ASC'))
                            //->paginate(10);

            //GUARDEM ELS RESULTATS A LA CACHE DURANT 5 MIN.
            Cache::put($key, $clients, 5);

        }

        //$clients->paginate(10);

        /* $clients = Client::paginate(10);

        $clients = Client::with(['cuote'])
                        ->orderBy('id', request('sorted', 'ASC'))
                        ->paginate(10); */

        //return $clients;
        //dd($clients);

        /* foreach($clients as $client){
            return $client->nom;
        } */

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('active'))
        {
            $request['active'] = true;
        }

        
        $client = Client::create($request->all());
        
        //$client->cuote()->attach($request->cuote_id);
        

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

   /*  public function search(Request $request)
    {
        if($request->ajax())
        {
            $output = "";

            $clients = Client::where('name', 'LIKE', '%'.$request->search.'%')->get();

            if($clients)
            {
                foreach( $clients as $key => $client){
                    $output.='<tr>'.
                        '<td>'.$client->id.'</td>'.
                        '<td>'.$client->name.'</td>'.
                        '<td>'.$client->surnames.'</td>'.
                        '<td>'.$client->email.'</td>'.
                        '<td>'.$client->dni.'</td>'.
                        '<td>'.$client->cuote->display_name.'</td>'.
                        '<td>'.$client->numCompte.'</td>'.
                        //'<td>'.$client->active.'</td>'.
                        '<td><input class="switch" id="switch-id" type="checkbox" value="'.$client->active.'"';
                    
                    if($client->active)
                    {
                        $output.=' checked';
                    }
                    
                    $output.='></td></tr>';

                    //dd($output);

                }
                
            }
            return Response($output);
        }
    } */
}
