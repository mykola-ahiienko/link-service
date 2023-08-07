<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Settings;
use App\Models\Link;
use App\Services\LinkService;
use  Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * @return View
     */
    public function create(): View
    {
        return view('create_link');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'source_url' => 'required|url',
            'max_clicks' => 'required|integer|min:0',
            'expires_at' => 'required|date|after:now|before:tomorrow',
        ]);

        $token = Str::random(Settings::TOKEN_LENGTH->value);

        $link = new Link([
            'source_url' => $request->input('source_url'),
            'token' => $token,
            'max_clicks' => $request->input('max_clicks'),
            'expires_at' => $request->input('expires_at'),
        ]);

        $link->save();

        return redirect()->route('link.show', ['token' => $token]);
    }

    /**
     * @param string $token
     * @param LinkService $linkService
     * @return mixed
     */
    public function show(string $token, LinkService $linkService): mixed
    {
        $link = Link::where('token', $token)->firstOrFail();
        $link->increment('clicks');

        if (!$linkService->isValid($link)) {
            return redirect()->route('link.not_found');
        }

        return redirect($link->source_url);
    }

    /**
     * @return View
     */
    public function notFound(): View
    {
        return view('404');
    }
}
