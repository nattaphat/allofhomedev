<?php namespace App\Http\Requests;
use App\Http\Requests\Request;

class BrandRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_name' => 'required|max:100',
            'email' => 'email'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'กรุณากรอกข้อมูล',
            'max' => 'กรุณากรอกข้อมูลน้อยกว่า :max ตัวอักษร',
            'date_format' => 'รูปแบบวันที่ไม่ถูกต้อง',
            'url' => 'รูปแบบ URL ไม่ถูกต้อง'
        ];
    }

}