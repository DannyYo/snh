<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
//php artisan make:request StoreArticleRequest
class StoreArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

//        $commentId = $this->route('comment');
//
//        return Comment::where('id', $commentId)
//            ->where('user_id', Auth::id())->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'account' => 'required|min:3',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password', //'author.name' => 'required', //嵌套的
            'email' => 'required|email',
        ];
    }
}
