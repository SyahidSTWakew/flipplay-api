<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $mediaId = $this->route('medium')?->id;

        $titleRule = Rule::unique('media', 'title');

        if ($mediaId) {
            $titleRule->ignore($mediaId);
        }

        if ($this->isMethod('PATCH')) {
            return [
                'title' => ['sometimes', 'required', 'string', $titleRule],
                'type' => ['sometimes', 'required', 'in:anime,manga,drama,light_novel'],
                'genre' => ['sometimes', 'nullable', 'string'],
                'description' => ['sometimes', 'nullable', 'string'],
                'release_year' => ['sometimes', 'nullable', 'integer', 'min:1900', 'max:2100'],
            ];
        }

        return [
            'title' => ['required', 'string', $titleRule],
            'type' => ['required', 'in:anime,manga,drama,light_novel'],
            'genre' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'release_year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul media wajib diisi.',
            'title.unique' => 'Judul media sudah tersedia.',
            'type.required' => 'Jenis media wajib diisi.',
            'type.in' => 'Jenis media harus anime, manga, drama, atau light_novel.',
            'release_year.integer' => 'Tahun rilis harus berupa angka.',
        ];
    }
}