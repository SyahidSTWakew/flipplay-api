<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use App\Http\Resources\MediaResource;
use Illuminate\Http\JsonResponse;

class UserCollectionController extends Controller
{
    // GET /api/users/{user}/collection
    // Menampilkan koleksi media pengguna
    public function index(User $user)
    {
        $media = $user->media()
            ->latest('media.created_at')
            ->paginate(10);

        return MediaResource::collection($media);
    }

    // POST /api/users/{user}/collection/{media}
    // Menambahkan media ke koleksi pengguna
    public function store(User $user, Media $media): JsonResponse
    {
        // Periksa apakah media sudah ada di koleksi
        $alreadyExists = $user->media()
            ->where('media.id', $media->id)
            ->exists();

        if ($alreadyExists) {
            return response()->json([
                'message' => 'Media sudah ada di koleksi pengguna.'
            ], 409);
        }

        // Tambahkan hubungan ke tabel pivot
        $user->media()->attach($media->id);

        return response()->json([
            'message' => 'Media berhasil ditambahkan ke koleksi.',
            'data' => [
                'user_id' => $user->id,
                'media_id' => $media->id,
                'title' => $media->title,
            ]
        ], 201);
    }

    // DELETE /api/users/{user}/collection/{media}
    // Menghapus media dari koleksi pengguna
    public function destroy(User $user, Media $media): JsonResponse
    {
        // Pastikan media memang ada di koleksi pengguna
        $alreadyExists = $user->media()
            ->where('media.id', $media->id)
            ->exists();

        if (!$alreadyExists) {
            return response()->json([
                'message' => 'Media tidak ditemukan dalam koleksi pengguna.'
            ], 404);
        }

        // Hapus hubungan dari tabel pivot
        $user->media()->detach($media->id);

        return response()->json([
            'message' => 'Media berhasil dihapus dari koleksi.'
        ], 200);
    }
}
