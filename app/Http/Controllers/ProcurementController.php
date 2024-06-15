<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procurement;

class ProcurementController extends Controller
{
    public function uploadProcuredItem(Request $request){
        $request->validate([            
            'itemName' => 'required',          
            'supplier' =>  'required', 
            'link' =>  'required',
        ]);

        $procurementItem = [   
            'itemName' => $request -> itemName,          
            'supplier' =>  $request -> supplier, 
            'link' =>  $request -> link, 

        ];

        $newProcurement = Procurement::create($procurementItem);

        return redirect()->route('procurement_management')->with('success', 'Item Added!');
    }

    public function procurement_management()
    {
        $procurementItem = Procurement::all()->reverse();
        return view('adminPages.procurement', ['procurementItem' => $procurementItem]);
    }

    public function updateProcuredItem(Procurement $procurementItem, Request $request) {
        $request->validate([            
            'itemName' => 'required',          
            'supplier' =>  'required', 
            'link' =>  'required',
        ]);

          // Update other form data
          $updatedProcurementItem = [
            'itemName' => $request->itemName,            
            'supplier' => $request->supplier,
            'link' => $request->link,

        ];

        $procurementItem->update($updatedProcurementItem);

        return redirect(route('procurement_management'))->with('success', 'Item updated successfully');

    }

    public function delete(Procurement $procurementItem) {
        $procurementItem->delete();
        return redirect()->route('procurement_management')->with('success', 'Item deleted successfully');
    }

}