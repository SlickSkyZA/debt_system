<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Debtor;
use App\Models\DebtDetails;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $debtor = Debtor::orderBy('created_at', 'DESC')->get();
        return view('debt.create', ['debtor' => $debtor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $check = Debt::where('user_id', '=', $data['user_id'])->first();
        if ($check) {
            return redirect()->route('debt.create')->with('message', 'Data sudah ada');
        }
        $result = Debt::create($data);
        return redirect()->route('/')->with('message', 'Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $data = DebtDetails::where('debts.id', '=', $id)
                            ->join('debts', 'debts.id', '=', 'debt_details.debt_id')
                            ->select('debt_details.*', 'debts.id AS debt_id')
                            ->orderBy('debt_details.created_at', 'DESC')
                            ->get();
        $debt = Debt::where('id', '=', $id)->first();
        return view('debt.detail', ['data' => $data, 'id' => $id, 'debt' => $debt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function edit(debt $debt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, debt $debt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $result = DebtDetails::destroy($id);
        return redirect()->back();
    }

    public function give(int $id)
    {
        return view('debt.give', ['id' => $id]);
    }
    public function accept(int $id)
    {
        return view('debt.accept', ['id' => $id]);
    }

    public function detail_store(Request $request)
    {
        $data = $request->except('_token');
        $result = DebtDetails::create($data);
        return redirect()->route('debt.show', $data['debt_id']);
    }
}
