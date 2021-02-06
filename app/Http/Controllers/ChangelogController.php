<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Statamic\Markdown\Parser;
use Statamic\View\View;

class ChangelogController extends Controller
{
    public function show(Request $request)
    {
        $version = $request->segments()[0];

        $releases = Http::get('https://api.github.com/repos/doublethreedigital/simple-commerce/releases?per_page=100');

        $releases = collect($releases->json())
            ->filter(function ($release) use ($version) {
                return Str::contains($release['name'], $version);
            })
            ->map(function ($release) {
                $body = (new Parser())->parse($release['body']);

                $body = Str::of($body)
                    ->replace('[fix]', '<span class="bg-red-200 px-2 text-red-700 font-medium mr-1">Fix</span>')
                    ->replace('[new]', '<span class="bg-blue-200 px-2 text-blue-700 font-medium mr-1">New</span>')
                    ->replace('[break]', '<span class="bg-red-200 px-2 text-red-700 font-medium mr-1">Breaking change</span>')
                    ->replace('[breaking]', '<span class="bg-red-200 px-2 text-red-700 font-medium mr-1">Breaking change</span>');

                $body = preg_replace_callback('/(?<=\s)#(\w+)/', function($match) {
                    return sprintf('<a href="https://github.com/doublethreedigital/simple-commerce/issues/%s">#%s</a>',
                       urlencode($match[1]),
                       $match[1]
                    );
                }, htmlspecialchars($body));

                return [
                    'name' => $release['name'],
                    'date' => Carbon::parse($release['published_at']),
                    'body' => $body,
                ];
            })
            ->toArray();

        return (new View)
            ->make('changelog')
            ->layout('layout')
            ->with([
                'title' => 'Changelog',
                'releases' => $releases,
            ])
            ->render();
    }
}
