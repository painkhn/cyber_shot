<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /*
    * Открытие админки
    */
    public function index() {
        return view('admin', [
            'categories' => Category::all()
        ]);
    }

    /*
    * Скачивание отчета
    */
    public function exel()
    {
        return Excel::download(new ReportExport, 'info.xlsx');
    }
}
