<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Http\Requests\MediaRequest;
use App\Http\Resources\MediaResource;
use Illuminate\Http\JsonResponse;

class MediaController extends Controller
{
    // GET /api/media
    // Menampilkan seluruh media
    public function index()
    {
        $media = Media::latest()->paginate(10);

        return MediaResource::collection($media);
    }

    // GET /api/media/{id}
    // Menampilkan detail satu media
    public function show(Media $medium)
    {
        $medium->load('users');

        return new MediaResource($medium);
    }

    // POST /api/media
    // Menambahkan media baru
    public function store(MediaRequest $request)
    {
        $media = Media::create($request->validated());

        return (new MediaResource($media))
            ->response()
            ->setStatusCode(201);
    }

    // PATCH /api/media/{id}
    // Mengubah data media
    public function update(MediaRequest $request, Media $medium)
    {
        $medium->update($request->validated());

        return new MediaResource($medium);
    }

    // DELETE /api/media/{id}
    // Menghapus media
    public function destroy(Media $medium): JsonResponse
    {
        $medium->delete();

        return response()->json([
            'message' => 'Media berhasil dihapus.'
        ], 200);
    }
}