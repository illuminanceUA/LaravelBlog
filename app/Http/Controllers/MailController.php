<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

public function __construct()
{
$this->middleware('auth');

}
public function send()
{

Mail::send(['text' => 'confirm'], ['name', 'Artem'],  function ($message){
$message->to('artem.sereda1997@gmail.com', 'Artem')->subject('Registration success!');
$message->from('team.power.blow@gmail.com', 'LaravelBlog');
});
}
}
