<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Address;
use App\Models\User;
use App\Models\File;
use App\Models\FileLink;

class FileController extends Controller
{
    public function index()
    {
        $files = File::join('file_links', function($join) {$join->on('files.id', 'file_links.project_id');} )->orderby('file_links.limit_dt', 'desc')->get();

        return view('file_list', compact('files'));
    }

    public function upload(Request $request)
    {
        $user = $request->user();
        $fname = $request['fname'];
        $image = $request->file('image');
        $limit = $request['limit']; 
        //画像が送信されてきていたら保存処理
        if($image){
            //保存されたパス
            $image_url = Storage::disk('public')->put('user_profile_image', $image, 'public'); //画像の保存処理
            $file = new File();
            $file->name = $fname;
            $file->path = $image_url;
            $file->valid = 1;
            $file->save();
            $id = $file->id;

            switch($limit) {
                case "1": $limit_dt = date("Y-m-d H:i:s", strtotime("+1 hour"));break;
                case "2": $limit_dt = date("Y-m-d H:i:s", strtotime("+1 day"));break;
                case "3": $limit_dt = date("Y-m-d H:i:s", strtotime("+3 day"));break;
                case "4": $limit_dt = date("Y-m-d H:i:s", strtotime("+1 month"));break;
            }

            $token = sprintf("%s", bin2hex(random_bytes(16)));
            $link = new FileLink();
            $link->project_id = $id;
            $link->token = $token;
            $link->limit_dt = $limit_dt;
            $link->valid = 1;
            $link->save();

            $this->sendMail($request, $token, $limit_dt);

            return view('upload', compact('token', 'limit_dt'));
        }

        //$files = File::all();

        //return view('upload', compact('files'));

        return view('upload');
     }

    public function download($token)
    {
        $link = FileLink::where('token', $token)->where('valid', 1)->where('limit_dt', '>=', now())->first();

        //画像が送信されてきていたら保存処理
        if($link){
            $file = File::find($link->project_id);
            $filePath = storage_path('app/public') . "/" . $file->path;
            if (file_exists($filePath)) {

                $this->downloadFile($filePath);
            }
        }
        http_response_code(403);
        echo "<h1>無効なリンクです（既に公開終了されたか存在しません）。</h1>";
    }

    function downloadFile($filePath, $mimeType = null) {
        // ファイルが存在しない場合はエラー
        if (!is_readable($filePath)) {
            die("File not found: ");
        }

        // MIMEタイプの自動判定
        $mimeType = $mimeType ?? mime_content_type($filePath);

        // MIMEタイプが不明の場合のデフォルト設定
        if (!preg_match('/^\S+\/\S+$/', $mimeType)) {
            $mimeType = 'application/octet-stream';
        }

        // 必要なヘッダーを設定
        header('Content-Type: ' . $mimeType);
        header('X-Content-Type-Options: nosniff');
        header('Content-Length: ' . filesize($filePath));
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Connection: close');

        // 出力バッファリングを無効化
        while (ob_get_level()) {
            ob_end_clean();
        }

        // ファイルを出力
        readfile($filePath);
        exit;
    }

    function sendMail($request, $token, $limit_dt) {
        $fname = $request['fname'];
        $send_list  =  $request['send'];
        if ($send_list != null) {
            $emails = array();
            foreach($send_list as $u) {
                $email = User::where('id', $u)->where('valid', 1)->first();
                if ($email) {
                    $emails[] = new Address($email['email'], $email['name']);
                }
            }
            //var_dump($emails);

            if(0 < count($emails)) {
                            $note = ''
                  . "\r\n" . '共有ファイルが提供されました。'
                  . "\r\r" .  route('file.download', ['token'=>$token])
                  . "\r\n" . '公開期限は' . $limit_dt . 'です'
              ;
              Mail::raw($note, function (Message $message) use($fname, $emails) {
                  $message
                  ->to($emails)
                  ->subject($fname . 'ファイルが共有されました');
              });
            }
        }
    }
}

