<?php

namespace App\Http\Controllers;

use App\Services\CheckExtensionServices;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\MOdels\User; //追加
use App\Services\FileUploadServices;
use App\Http\Request\ProfileRequest; 




class UserController extends Controller
{
    // showメソッドでは、 引数に$idをとり、$idの値があればusers/edit.blade.phpを表示
    public function show($id)
    {
        $user = User::findorFail($id); //User::findorFail($id);という書き方で、Userモデル(userテーブル)内に指定のidがあれば取得、という命令になります。

        return view('users.show',compact('user'));
    }

    // 
    public function edit($id)
    {
        $user = User::findorFail($id);

        return view('users.edit', compact('user'));
    }
    
    // updateメソッドでは、 引数に$requestと$idをとっています。
    public function update($id, ProfileRequest $request) 
    {
        $user = User::findorFail($id); //$idにあうユーザー情報を取得
        
        //画像ファイルがアップロードされているかどうかを判定。
        //もし画像ファイルがアップロードされていれば ユニークなファイル名を生成し、 画像ファイルをリサイズして保存します。
        if(!is_null($request['img_name'])){ 
            $imageFile = $request['img_name'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension, $fileNameToStore, $fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
            $image = Image::make($data_url);
            $image->resize(400,400)->save(storage_path() . '/app/public/image/' . $fileNameToStore );

            $user->image_name = $fileNameToStore;
        }
        
        //$requestの中に フォームで投稿された内容が入る。
        //フォームに入力された値を$userにセット
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->self_introduction = $request->self_introduction;

        $user->save();

        return redirect('home');
    }

}
