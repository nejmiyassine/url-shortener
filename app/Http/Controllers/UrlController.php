<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUrlRequest;
use App\Http\Requests\UpdateUrlRequest;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    //
    public function index($user_id)
    {
        $userUrls = Url::where('user_id', $user_id)->latest()->paginate(5);
        return response()->json($userUrls);
    }

    public function show($url)
    {
        $url = Url::Where('shorten_url', $url)->first();
        $url->increment('visits');
        return redirect($url->full_url);
    }

    public function store(StoreUrlRequest $request)
    {
        $credentials = [
            'full_url' => $request->full_url,
            'shorten_url' => Str::random(),
            'user_id' => $request->user_id,
            'visits' => 0,
        ];
        $url = Url::create($credentials);

        return response()->json($url);
    }

    public function update(UpdateUrlRequest $request, $url)
    {
        $url = Url::Where('shorten_url', $url)->first();

        $credentials = [
            'full_url' => $request->full_url,
            'user_id' => $request->user_id,
        ];
        $updatedUrl = $url->update($credentials);

        return response()->json($updatedUrl);
    }

    public function destroy($url)
    {
        $url = Url::Where('shorten_url', $url)->first();
        $url->delete();
        return response()->json(['message' => 'Url has been deleted successfully']);
    }
}
