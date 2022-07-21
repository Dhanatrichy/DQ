<?php

namespace App\Http\Controllers\Car\Type;

use App\Models\Product;
use App\Models\CarType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class CarTypeController extends Controller
{


    public function index()
    {
        $queries = CarType::latest()->paginate(5);

        return view('Car.Type.index', compact('queries'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('Car.Type.create');
    }


    public function store(Request $request)
    {


        $input = $request->all();


        if ($request->hasFile('image')) {
            $input['image'] = $this->imageUpload($request->file('image'));
        }

        $model = CarType::create($input);

        return redirect()->route('carType.index')
            ->with('success', 'Product created successfully.');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    public function edit($id)
    {

        $product = CarType::where('id', $id)->first();

        return view('Car.Type.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = CarType::where('id', $id)->first();
        $input = $request->all();

        if ($request->hasFile('image')) {
            unlink("image/Car/Type/" . $product->image);
            $input['image'] = $this->imageUpload($request->file('image'));
        } else {
            unset($input['image']);
        }

        $product->update($input);

        return redirect()->route('carType.index')
            ->with('success', 'Product updated successfully');
    }
    public function imageUpload($imageName)
    {
        $image       = $imageName;
        $filename    = $image->getClientOriginalName();


        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300, 300);
        $image_resize->save(public_path('image/Car/Type/' . $filename));
        return $filename;
    }

    public function destroy($id)
    {

        $res = CarType::find($id)->delete();
        return redirect()->route('carType.index')
            ->with('success', 'Product deleted successfully');
    }
}
