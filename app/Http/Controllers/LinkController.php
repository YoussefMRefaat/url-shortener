<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortenLinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    private function generate(string $url): string
    {
        $code = Str::random(8);
        if(Link::create([
            'link' => $url,
            'code' => $code,
        ]))
            return $code;
        else
            return $this->generate($url);
    }

    public function shorten(ShortenLinkRequest $request): \Illuminate\Http\JsonResponse
    {
        $url = $request->validated()['link'];
        $exist = Link::where('link' , $url)->first();
        if($exist)
            $link = url('/links/' . $exist->code);
        else{
            $link = url('/links/' . $this->generate($url));
        }
        return response()->json([
            'link' => $link,
        ], 201);
    }

    public function get(string $code){
        $url = Link::where('code' , $code)->first();
        if(!$url)
            abort(404);
        return redirect($url->link);
    }
}
