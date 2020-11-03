<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CarController extends Controller
{

    public function index(Request $request)
    {
        $name = $request->name;
        $cars = Car::orderBy('name')->where('name', 'LIKE', "%$name%")->paginate(10);
        return view('app.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('app.cars.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'year'=>'required',
            'exchange'=>'required',
            'fuel'=>'required'
        ]);
        $slug = $request->name . " " . $request->year . " " . $request->exchange;
        $request['slug'] = Str::slug($slug);

        if ($request->hasFile('image') && $request->image->isValid()){
            $imagePath= ($request->image->store('car'));
            $data['image'] = $imagePath;
        }

        Car::create($request->all());
        return redirect()->back()->with('success', 'Carro salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $car = Car::find($id);
        $categories = Category::get();
        return view('app.cars.edit', compact('car', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'year'=>'required',
            'exchange'=>'required',
            'fuel'=>'required'
        ]);
        $request['slug'] = Str::slug($request->get('name'));

        $data = $request->all();

        $car = Car::find($id);


        if ($request->hasFile('image') && $request->image->isValid()){

            if($car->image && Storage::exists($car->image)){
                    Storage::delete($car->image);
            }

            $imagePath= Storage::disk('public')->putFile('cars', $request->image);
            $data['image'] = $imagePath;
        }


        $car->update($data);
        return redirect()->back()->with('success', 'Carro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $car)
    {
        if($car->image && Storage::exists($car->image)){
            Storage::delete($car->image);
        }
        Car::find($id)->delete();
        return redirect()->back()->with('success', 'Carro apagado com sucesso!');
    }
}
