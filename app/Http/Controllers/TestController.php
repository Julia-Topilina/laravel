<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Carpet;
use App\Models\City;
use App\Models\Color;
use App\Models\Pile_type;
use App\Models\Return_method;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public  function applicationCreate()
    {
        $data['typeies'] = Pile_type::get();
        $data['colors'] = Color::get();
        $data['cities'] = City::get();
        $data['returns'] = Return_method::get();

        return view('applicationCreate', $data);
    }

    public function applicationStore(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'city' => 'required',
                'dress' => 'required',
                'square' => 'required',
                'pile_type' => 'required',
                'color' => 'required',
                'return_method' => 'required',
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city_id = $request->city;
        $user->dress = $request->dress;
        $user->save();

        $carpet =new Carpet();
        $carpet->square = $request->square;
        $carpet->pile_type_id = $request->pile_type;
        $carpet->color_id = $request->color;
        $carpet->return_method_id = $request->return_method;
        $carpet->save();

        $app = new Application();
        $app->users_id = $user->id;
        $app->carpets_id = $carpet->id;
        $app->save();
    }

    public function index()
    {
        $data['app'] = Application::get();
        return view('index', $data);
    }
}
