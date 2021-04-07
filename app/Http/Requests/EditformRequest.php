<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditformRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if($this->path() == 'addAddress') {
            return true;
        } else if ($this->path() == 'update'){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'family_name' => 'required',
            'first_name' => 'required',
            'kana_family' => 'required',
            'kana_name' => 'required',
            'post_num' => 'required',
            'address1' => 'required',
        ];
    }

    public function messages() {
        return [
            'family_name.required' => '姓は必ず入力してください',
            'first_name.required' => '名は必ず入力してください',
            'kana_family.required' => '姓（ふりがな）は必ず入力してください',
            'kana_name.required' => '名（ふりがな）は必ず入力してください',
            'post_num.required' => '郵便番号は必ず入力してください',
            'address1.required' => '住所1は必ず入力してください',
        ];
    }
}
