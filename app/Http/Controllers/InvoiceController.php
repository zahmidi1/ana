<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreclientsRequest;
use App\Http\Requests\StoreinvoiceRequest;
use App\Http\Requests\UpdateinvoiceRequest;
use App\Models\clients;
use App\Models\invoice;
use App\Models\milk_reception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoreclientsRequest $request)
    {
        $data = [
            'milk_reception'  =>
            DB::table('milk_receptions')
                ->where('id_client', $request->id_cli)
                ->orderBy('created_at', 'ASC')
                ->whereBetween('milk_receptions.created_at', [$request->debu, $request->fin])
                ->join('clients', 'milk_receptions.id_client', '=', 'clients.id')
                ->select('milk_receptions.*', 'clients.id', 'clients.nameCLI', 'clients.cin', 'clients.adress', 'clients.telefone')
                ->get(),
            'prix'   => $request->prix,
            'id_client' =>  $request->id_cli,
            'debu' =>  $request->debu,
            'fin' =>  $request->fin,


        ];

        //Invoice.blade
        return view('Invoice')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreclientsRequest  $request)
    {
        $request->validated([
            'date_payment' => 'required|min:5|max:25'
        ]);


        $invoice = new invoice();
        $invoice->id_client = $request->input('id_client');
        $invoice->id_user = $request->input('id_user');
        $invoice->debu = $request->input('debu');
        $invoice->fin = $request->input('fin');
        $invoice->prix = $request->input('prix');
        $invoice->qantiter = $request->input('qantiter');
        $invoice->total = $request->input('total');
        $invoice->date_payment = $request->input('date_payment');
        $invoice->save();

        $data = milk_reception::where('id_client', $request->input('id_client'))
            ->orderBy('created_at', 'ASC')
            ->whereBetween('milk_receptions.created_at', [$request->input('debu'), $request->input('fin')])
            ->get();

        foreach ($data as $gg) {
            $gg->update(['date_payment' => $request->input('date_payment')]);
            // $gg->date_payment = $request->input('date_payment');
            $gg->push();
        }

        return redirect("/client/")->with('status', 'insertion réussie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreinvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreinvoiceRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(invoice $id)
    {
    }





    public function historique(int $id)
    {
        $invo = invoice::where('id_client', '=', $id)
            ->join('clients', 'invoices.id_client', '=', 'clients.id')
            ->select('invoices.*', 'invoices.id', 'clients.nameCLI', 'clients.cin', 'clients.adress', 'clients.telefone')
            ->get();

        return view('historique_invoive')->with([
            "historique" =>  $invo
        ]);
    }




    public function afficher($id, $id_cli, $date_pay)
    {
        $affich = [
            'invoice'  => invoice::where('invoices.id', $id)
                ->join('clients', 'invoices.id_client', '=', 'clients.id')
                ->select('invoices.*',  'clients.nameCLI', 'clients.cin', 'clients.adress', 'clients.telefone')
                ->first(),
            'milk_reception'   => milk_reception::where('id_client', $id_cli)
                ->where('date_payment', $date_pay)
                ->get()
        ];

        // dd($affich);
        return view('PDF.invoice', compact('affich'));
    }




    public function telecharger($id, $id_cli, $date_pay)
    {
        $affich = [
            'invoice'  => invoice::where('invoices.id', $id)
                ->join('clients', 'invoices.id_client', '=', 'clients.id')
                ->select('invoices.*',  'clients.nameCLI', 'clients.cin', 'clients.adress', 'clients.telefone')
                ->first(),

            'milk_reception'   => milk_reception::where('id_client', $id_cli)
                ->where('date_payment', $date_pay)
                ->get()
        ];

        $data = [
            'affich' => $affich
        ];

        $pdf = Pdf::loadView('PDF.invoice', $data);
        return $pdf->download('/afficher/' . $id_cli . '.pdf');



        // return view('PDF.invoice', compact('affich'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice $invoice)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinvoiceRequest  $request
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateinvoiceRequest $request, invoice $invoice)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoice)
    {
        //
    }
}