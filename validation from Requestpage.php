<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest {
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

		switch ($this->method()) {
		case 'GET':
		case 'DELETE':
			{
				return [];
			}
		case 'POST':
			{
				return [
					'room_no' => 'required|unique:rooms',
					'room_name' => 'required|unique:rooms',
					'room_desc' => 'required',
					'room_price' => 'required|numeric',
					'room_type' => 'required',
					'room_size' => 'required||numeric|max:30',
					'room_guest' => 'required|numeric|min:1|max:5',
					'room_amenities' => 'required',
					'status' => 'nullable',
					'room_img' => 'image',
				];
			}
		case 'PUT':
		case 'PATCH':
			{
				return [
					'room_no' => 'required|unique:rooms,room_no,' . $this->room->id,
					'room_name' => 'required|unique:rooms,room_name,' . $this->room->id,
					'room_desc' => 'required',
					'room_price' => 'required|numeric',
					'room_type' => 'required',
					'room_size' => 'required||numeric|max:30',
					'room_guest' => 'required|numeric|min:1|max:5',
					'room_amenities' => 'required',
					'status' => 'nullable',
					'room_img' => 'image',
				];
			}
		default:break;
		}
	}

	public function messages() {
		return [
			'room_no.required' => 'Room Number must not be empty!',
			'room_name.required' => 'Room Name must not be empty!',
			'room_desc.required' => 'Room Description must not be empty!',
			'room_price.required' => 'Room Price must not be empty!',
			'room_type.required' => 'Room Type must not be empty!',
			'room_size.required' => 'Room size must not be empty!',
			'room_guest.required' => 'Room Guest must not be empty!',
			'room_amenities.required' => 'Room Amenities must not be empty!',
		];
	}
}
