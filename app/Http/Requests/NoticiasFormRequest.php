<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiasFormRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'titulo' => 'required|min:5',
			'topico' => 'required|min:5',
			'descricao' => 'required|min:5',
			'link' => 'url|required|min:5',
		];

	}
	public function messages() {
		return [
			'required' => 'O campo :attribute é obrigatório',
			'titulo.min' => 'O campo título precisa ter pelo menos 5 caracteres',
			'topico.min' => 'O campo tópico precisa ter pelo menos 5 caracteres',
			'descricao.min' => 'O campo descrição precisa ter pelo menos 5 caracteres',
			'link.min' => 'O campo link precisa ter pelo menos 5 caracteres',
			'link.url' => 'O campo link precisa ser um url válido',
		];
	}
}
