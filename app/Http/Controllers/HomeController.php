<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\User;
use Webpatser\Countries\Countries;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::join('users', 'users.id', '=', 'articles.user_id')
            ->select(['articles.*', 'users.name as user_name', 'users.id as user_id'])
            ->orderBy('articles.created_at', 'DESC')->where('active', 1)
            ->limit(12)->get();

        return view('home', ['articles' => $articles]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function countries()
    {
        $countries = Countries::getCountries();
        return response()->json([
            'countries' => $countries
        ]);
    }
}
