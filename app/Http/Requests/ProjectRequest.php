<?php namespace App\Http\Requests;
use App\Http\Requests\Request;

class ProjectRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'subtitle' => 'required|max:500',
            'for_cat[]' => 'required',
            'project_name' => 'required|max:100',
            'project_owner' => 'required|max:100',
            'project_owner_logo' => 'required',
            'telephone' => 'required|max:100',
            'add_street' => 'required',
            'tambid' => 'required',
            'amphid' => 'required',
            'provid' => 'required',
            'sell_price' => 'required',
            'sell_price_from' => 'required',
            'sell_price_to' => 'required',
            'construct_date' => 'required|date_format:d/m/Y',
            'finish_date' => 'required|date_format:d/m/Y',
            'video_url' => 'url',
            'website' => 'url',
            'status[]' => 'required'
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