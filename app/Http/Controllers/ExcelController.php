<?php

namespace App\Http\Controllers;

use App\Models\Excel as ExcelModel;
use App\Imports\ImportExcel;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $excels = ExcelModel::orderByDesc('id')->paginate(5);
        
        return view('index',[
            'excels'=> $excels
        ]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file'=>'required|mimes:xlsx,csv,xlx'
        ]);

        $excel = new ExcelModel();
        
        $excel->filename = time().'_'.$request->file->getClientOriginalName();
        
        $excel->save();
        
        $import = new ImportExcel($excel);
        $import->import($request->file('file'));

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }        
        
        return back()->withStatus('Record added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExcelModel  $excel
     * @return \Illuminate\Http\Response
     */
    public function show(ExcelModel $excel)
    {
        return view('show',[
            'excel'=> $excel,
        ]);  
    }

}