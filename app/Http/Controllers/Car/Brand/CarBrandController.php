<?php

namespace App\Http\Controllers\Car\Brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CarBrand;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class CarBrandController extends Controller
{
    public function index()
    {
        $queries = CarBrand::latest()->paginate(5);


        return view('Car.Brand.index', compact('queries'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('Car.Brand.cropImage');
    }


    public function store(Request $request)
    {
        dd($request->all());

        $folderPath = public_path('image/Brand/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
      
 
        file_put_contents($imageFullPath, $image_base64);
       $model = new CarBrand;
       $model ->$request->name;
       $model-> $imageFullPath;
       $model->save();
        return response()->json(['status'=>true]);
        // $input = $request->all();


        // if ($request->hasFile('image')) {
        //     $input['image'] = $this->imageUpload($request->file('image'));
        // }

        // $model = CarBrand::create($input);

        return redirect()->route('carBrand.index')
            ->with('success', 'Car Brand created successfully.');
    }
    public function edit($id)
    {

        $query = CarBrand::where('id', $id)->first();

        return view('Car.Brand.edit', compact('query'));
    }


    public function update(Request $request, $id)
    {
        $query = CarBrand::where('id', $id)->first();
        $input = $request->all();

        if ($request->hasFile('image')) {
            unlink("image/Car/Brand/" . $query->image);
            $input['image'] = $this->imageUpload($request->file('image'));
        } else {
            unset($input['image']);
        }

        $query->update($input);

        return redirect()->route('carBrand.index')
            ->with('success', 'Car Brand updated successfully');
    }
    public function imageUpload($imageName)
    {
        $image       = $imageName;
        $filename    = $image->getClientOriginalName();


        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300, 300);
        $image_resize->save(public_path('image/Car/Brand/' . $filename));
        return $filename;
    }

    public function destroy($id)
    {

        $res = CarBrand::find($id)->delete();
        return redirect()->route('carBrand.index')
            ->with('success', 'Car Brand deleted successfully');
    }
}
