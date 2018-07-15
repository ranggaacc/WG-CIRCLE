<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$transactions = Transaction::orderBy('id', 'desc')->paginate(10);

		return view('transactions.index', compact('transactions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('transactions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$transaction = new Transaction();

		$transaction->kode_order = $request->input("kode_order");
        $transaction->note = $request->input("note");
        $transaction->quantity = $request->input("quantity");
        $transaction->closing_date = $request->input("closing_date");
        $transaction->id_product = $request->input("id_product");
        $transaction->id_reward = $request->input("id_reward");
        $transaction->id_customer = $request->input("id_customer");
        $transaction->id_member = $request->input("id_member");

		$transaction->save();

		return redirect()->route('transactions.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$transaction = Transaction::findOrFail($id);

		return view('transactions.show', compact('transaction'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$transaction = Transaction::findOrFail($id);

		return view('transactions.edit', compact('transaction'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$transaction = Transaction::findOrFail($id);

		$transaction->kode_order = $request->input("kode_order");
        $transaction->note = $request->input("note");
        $transaction->quantity = $request->input("quantity");
        $transaction->closing_date = $request->input("closing_date");
        $transaction->id_product = $request->input("id_product");
        $transaction->id_reward = $request->input("id_reward");
        $transaction->id_customer = $request->input("id_customer");
        $transaction->id_member = $request->input("id_member");

		$transaction->save();

		return redirect()->route('transactions.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$transaction = Transaction::findOrFail($id);
		$transaction->delete();

		return redirect()->route('transactions.index')->with('message', 'Item deleted successfully.');
	}

}
