<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchFeedbackController extends Controller
{
    public function store(Request $request)
    {
        $searchLogPath = storage_path('app/searches.json');

        if (! file_exists($searchLogPath)) {
            file_put_contents($searchLogPath, json_encode([]));
        }

        $log = collect(json_decode(file_get_contents($searchLogPath), true))
            ->merge([
                $request->searchQuery,
            ])
            ->unique()
            ->toJson(JSON_PRETTY_PRINT);

        file_put_contents($searchLogPath, $log);

        return [
            'message' => "What a sunny day outside..."
        ];
    }
}
