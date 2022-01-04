<?php

namespace App\Http\Requests\Ads;

use Illuminate\Foundation\Http\FormRequest;

class AddAdsRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'price' => 'required|numeric',
            'from_time' => 'required',
            'to_time' => 'required',
            'link' => 'required|max:100|unique:ads',
            'alt' => 'required|max:100|unique:ads',
        ];
    }
    public function messages()
    {
        return [

            'image.required' => 'Không được để trống trường này!',
            'image.mimes' => 'Định dạng ảnh không hợp lệ!',
            'price.required' => 'Không được để trống trường này!',
            'price.numeric' => 'Dữ liệu nhập vào phải là số!',
            // 'price.max' => 'Trường này không được quá 50 kí tự!',
            'from_time.required' => 'Không được để trống trường này!',
            'to_time.required' => 'Không được để trống trường này!',
            'link.required' => 'Không được để trống trường này!',
            'link.unique' => 'Trường này đã tồn tại!',
            'link.max' => 'Trường này không được quá 100 kí tự!',
            'alt.required' => 'Không được để trống trường này!',
            'alt.unique' => 'Trường này đã tồn tại!',
            'alt.max' => 'Trường này không được quá 100 kí tự!',
        ];
    }
}
