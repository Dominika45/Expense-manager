<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBudgetRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'category_id' => [
					'required',
					Rule::exists('categories', 'id')->where('user_id', auth()->id()),
				],
			'month' => 'required|date',
			'limit_amount' => 'required|numeric|min:0.01',
		];
	}
}
