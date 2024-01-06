<?php

namespace App\Repositories\admin;

use App\Models\RoomType;

class RoomTypesRepository
{
    private $moduleName;
    private $data;
    private $model;

    public function __construct()
    {
        $this->model = RoomType::class;
        $this->moduleName = 'admin.roomTypes.';
    }

    public function layout($pageName)
    {
        echo view($this->moduleName.$pageName, $this->data);
    }

    public function index()
    {
        $this->data = [
            'title'         => 'List of room types',
            'roomTypes' => $this->model::all() ?? config('testdata.roomTypes')
        ];
        $this->layout('index');
    }

    public function store($request)
    {
        try {
            $id = $request->type_id;

            if($id) {
                $type = $this->model::find($id);
            } else {
                $type = new $this->model;
            }

            $type->title = $request->title;
            $type->description = $request->description;
            $type->status = $request->status;
            $type->save();
            return redirect()->route('admin.room-types.index')->with('success', 'Successfully saved');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
