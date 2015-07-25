<?php namespace App\Http\Requests;
use App\Http\Requests\Request;

class BannerARequest extends Request {

    public function rules()
    {
        return [
            'banner_name' => 'required|max:100',
            'url' => 'url'
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