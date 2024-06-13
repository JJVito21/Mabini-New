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
            'quantity' =>  'required',
        ]);
        
        $procurementItem = [   
            'itemName' => $request -> itemName,          
            'supplier' =>  $request -> supplier, 
            'quantity' =>  $request -> quantity, 

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
            'quantity' =>  'required',
        ]);

          // Update other form data
          $updatedProcurementItem = [
            'itemName' => $request->itemName,            
            'supplier' => $request->supplier,
            'quantity' => $request->quantity,

        ];

        $procurementItem->update($updatedProcurementItem);

        return redirect(route('procurement_management'))->with('success', 'Item updated successfully');

    }

    public function delete(Procurement $procurementItem) {
        $procurementItem->delete();
        return redirect()->route('procurement_management')->with('success', 'Item deleted successfully');
    }
    
}

