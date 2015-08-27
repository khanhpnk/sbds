<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MessageRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        authenticated user actually has the authority to update a given resource.
//        $commentId = $this->route('comment');
//        return Comment::where('id', $commentId)
//            ->where('user_id', Auth::id())->exists();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('POST')) {
            return [
                'to' => 'required|email',
                'subject' => 'required|max:255',
                'message' => 'required',
            ];
        }

        return [];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'to' => 'email người nhận',
            'subject' => 'chủ đề tin nhắn',
            'message' => 'nội dung tin nhắn',
        ];
    }
}
