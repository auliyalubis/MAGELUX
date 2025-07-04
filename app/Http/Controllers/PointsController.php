<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Map',
        ];

        return view('map', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Validate request
        $request->validate(
            [
                'name' => 'required|unique:points,name',
                'category' => 'required',
                'description' => 'required',
                'address' => 'required',
                'geom_point' => 'required',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Name already exist',
                'category.required' => 'Category is required',
                'description.required' => 'Description is required',
                'address.required' => 'Address is required',
                'geom_point.required' => 'Geometry point is required',
            ]
        );

        //Create image directory if not exist
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        //Get image file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_point." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data = [
            'geom' => $request->geom_point,
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'address' => $request->address,
            'image' => $name_image,
            'user_id' => auth()->user()->id,
        ];

        // Create data
        if (!$this->points->create($data)) {
            return redirect()->route('map')->with('error', 'Point failed to add');
        }

        //Redirect data
        return redirect()->route('map')->with('success', 'Point has been added');
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
        $data = [
            'title' => 'Edit Point',
            'id' => $id,
        ];

        return view('edit-point', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validate request
        $request->validate(
            [
                'name' => 'required|unique:points,name,' . $id,
                'category' => 'required',
                'description' => 'required',
                'address' => 'required',
                'geom_point' => 'required',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Name already exist',
                'category.required' => 'Category is required',
                'description.required' => 'Description is required',
                'address.required' => 'Address is required',
                'geom_point.required' => 'Geometry point is required',
            ]
        );

        //Create image directory if not exist
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        //Get old image file name
        $old_image = $this->points->find($id)->image;

        //Get image file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_point." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);

            // Delete old image only if new one is uploaded
            if($old_image != null) {
            if (file_exists('storage/images/' . $old_image)) {
                unlink('storage/images/' . $old_image);
            }
        }
        } else {
            $name_image = $old_image;
        }

        $data = [
            'geom' => $request->geom_point,
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'address' => $request->address,
            'image' => $name_image,
        ];

        // Create data
        if (!$this->points->find($id)->update($data)) {
            return redirect()->route('map')->with('error', 'Point failed to update');
        }

        //Redirect data
        return redirect()->route('map')->with('success', 'Point has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imagefile = $this->points->find($id)->image;

        if (!$this->points->destroy($id)) {
            return redirect()->route('map')->with('error', 'Point failed to delete');
        }

        // Delete image
        if ($imagefile != null) {
            if (file_exists('storage/images/' . $imagefile)) {
                unlink('storage/images/' . $imagefile);
            }
        }

        return redirect()->route('map')->with('success', 'Point deleted successfully');
    }
}
