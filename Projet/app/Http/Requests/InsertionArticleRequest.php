<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertionArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titreArticle' => 'required|min:5|max:45',
            'contenuArticle' =>'required|max:2000',

            //
        ];
    }
}
