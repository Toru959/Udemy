<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index() {

        
        // Eloquent(エロくアント)
        $values = Test::all();
        //dd('$values');
        $count = Test::count();
        $first = Test::findOrFail(1);
        $where = Test::where('text', '=', 'masuko')->get();

        dd($values, $count, $first, $where);

        //　クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'toru')
        ->selet('id', 'text')
        ->get();

        dd($queryBuilder);

        return view('tests.test', compact('values'));

        return view('tests.test');
    }
}
