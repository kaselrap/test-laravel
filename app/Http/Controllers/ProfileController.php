<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;

class ProfileController extends Controller
{

    protected $allowed_extension = [
        'jpg',
        'jpeg',
        'png',
        'gif'
    ];

    protected $gender = [
        'male',
        'femail'
    ];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(User $user = null)
    {
        return view('user.profile', ['user' => $user]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('profile.edit', [
            'profile' => Auth::user(),
            'gender' => $this->gender
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $user = Auth::user();
        $request = request();

        $user->data = $request->input('data', []);
        if($request->hasFile('avatar')) {
            $storagePath = storage_path() . '/app/public/avatars/';

            $file = $request->file('avatar');

            $extension = strtolower($file->getClientOriginalExtension());
            if(in_array($extension, $this->allowed_extension, true)) {
                $fileName = auth()->user()->id . '_' . $file->getClientOriginalName();
                if(file_exists($storagePath . $fileName)) {
                    @unlink($storagePath, $fileName);
                }
                if($file->move($storagePath, $fileName)) {
                    $user->avatar = $fileName;
                }
            }
        }

        $user->save();

        return redirect()->route('profile.edit', ['profile' => Auth::user()]);
    }

    public function countries(Request $request)
    {
        $countries = Countries::all()->sortBy('name.common');

        $countries = $countries->pluck('name.common')->map(function($value){
            return ['id' => $value, 'text' => $value];
        });
        if ($request->has('term')) {
            $term = $request->input('term');
            $countries = array_values($countries->filter(function($value) use ($term){
                return preg_match("#(.*?)".preg_quote($term)."(.*)#is", $value['text']);
            })->map(function($value){
                return ['id' => $value['id'], 'text' => $value['text']];
            })->toArray());


        }
        $data = [
            'results' => $countries
        ];
        return response()->json($data);
    }
}
