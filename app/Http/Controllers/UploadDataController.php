<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadDataRequest;
use App\Repositories\All\UploadData\UploadDataInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadDataController extends Controller
{
    protected UploadDataInterface $repository;

    public function __construct(UploadDataInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadDataRequest $request)
    {
        $file = $request->file('file');

        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $storedName = Str::uuid() . '.' . $extension;

        $file->storeAs('uploads', $storedName, 'public');

        $data = [
            'file_name'   => $originalName,
            'stored_name' => $storedName,
            'format'      => $extension,
            'user_id'     => $request->user_id,
        ];

        $upload = $this->repository->create($data);

        return response()->json([
            'message' => 'File uploaded successfully',
            'data'    => $upload
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->repository->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = $this->repository->find($id);

        if (!$record) {
            return response()->json(['message' => 'Not found'], 404);
        }

        Storage::disk('public')->delete('uploads/' . $record->stored_name);

        $this->repository->delete($id);

        return response()->json(['message' => 'Deleted successfully']);
    }
}
