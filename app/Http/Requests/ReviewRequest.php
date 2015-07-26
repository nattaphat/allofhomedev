<?php namespace App\Http\Requests;
use App\Http\Requests\Request;

class ReviewRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'cat_home_id' => 'required',
            'video_url' => 'url'
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