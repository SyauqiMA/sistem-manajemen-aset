<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPurchaseRequestRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class PurchaseRequestController extends Controller
{
    /**
     * add purchase request
     */
    public function add(AddPurchaseRequestRequest $request): RedirectResponse {
        // get validated data
        $validated = $request->validated();

        // insert data to DB
        DB::table('purchase_request')->insert([
            'purchase_request_number' => $validated['pr-number'],
            'purchase_request_name' => $validated['pr-desc'],
            'purchase_request_date'=> $validated['pr-date'],
            'status' => 1, // 1 for pending
            'id_user' => Auth::id()
        ]);

        return back()->with('status', 'Succesfully stored data');
    }

    /**
     * view purhase request data
     *  */ 
    public function show(Request $request): View {
        // get all 'purchase-request' table data
        $rows = DB::table('purchase_request')
                ->select(['purchase_request_number',
                        'purchase_request_name',
                        'purchase_request_date',
                        'status'])
                ->get();
        
        return view('view-purchase-request', ['rows' => $rows]);
        
    }

    /**
     * View PR Data untuk Direktur
     */
    public function direkturShow(Request $request): View {
        // get all purchase request with status=1
        $rows = DB::table('purchase_request')
                ->select(['id',
                          'purchase_request_number',
                          'purchase_request_name',
                          'purchase_request_date',
                          'id_user'])
                ->where('status', '=', 1)
                ->get();
        
        return view('received-purchase-requests', ['rows' => $rows]);
    }
}
