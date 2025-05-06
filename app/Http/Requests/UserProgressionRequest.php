<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProgressionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // L'utilisateur doit être authentifié
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'story_id' => 'required|exists:stories,id',
            'current_chapter_id' => 'required|exists:chapters,id',
            'visited_chapters' => 'nullable|array',
        ];
    }
}