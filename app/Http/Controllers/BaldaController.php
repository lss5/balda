<?php

namespace App\Http\Controllers;

use App\Services\BestWordService;
use Illuminate\Http\Request;

class BaldaController extends Controller
{
    public function index()
    {
        $table = [
            ['', '', '', '', '', 'и'],
            ['т', 'о', 'ч', 'к', 'и', 'а'],
            ['н', 'е', 'б', 'о', 'к', 'у'],
            ['с', 'о', 'л', 'н', 'ц', 'е'],
            ['', '', '', 'ь', '', ''],
            ['', '', '', '', '', ''],
        ];

        $BaldaService = new BestWordService($table);
        $words = $BaldaService->find();

        return view('balda', [
            'words' => $words,
        ]);
    }

    public function create(Request $request)
    {
        $size = $request->size;
    }

    public function update(Request $request)
    {
        $table = $request->table;
        $BaldaService = new BestWordService($table);
        $words = $BaldaService->find();

        return view('balda', [
            'words' => $words,
        ]);
    }
}
