<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Size;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::search(request()->query())->orderBy('order')->paginate(15);
        return view('dashboard.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Slider();
        return view('dashboard.slider.create' , compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        // dd($request);
        if ($request->hasFile('mockups')) {
            foreach ($request->file('mockups') as $file) {
                $path = $file->store('uploads/mockups', 'public');
                $mockups[] = $path;
            }
        } else {
            $mockups = NULL;
        }
        if($request->has('order')){
            foreach($request->get('order') as $ord){
                $orders[] = $ord;
            }
        } else {
            $orders = null ;
        }


        for ($i=0; $i < count($mockups) ; $i++) {
            for ($j=0; $j < count($orders) ; $j++) {
                if($j == $i){
                    Slider::create([
                                'is_active' => $request->get('is_active'),
                                'mockups' => image_url($mockups[$i]),
                                'order' => $orders[$j],
                            ]);
                }
            }
        }
        return redirect(route('dashboard.slider.index'))->with('success' , 'Slider Created is done');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Slider::findOrFail($id);
        return view('dashboard.slider.edit' , compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        $model = Slider::findOrFail($id);
        if ($request->hasFile('mockups')) {
            $file = $request->file('mockups');
            $path = $file->store('uploads/mockups', 'public');
        }
        $model->update([
            'is_active' => $request->get('is_active'),
            'mockups' => image_url($path),
            'order' => $request->get('order'),
        ]);
        return redirect(route('dashboard.slider.index'))->with('success' , 'Slider Updated is done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Slider::find($id)->delete();
        return redirect()->route('dashboard.slider.index')
                        ->with('success','Slider deleted successfully');
    }
}
