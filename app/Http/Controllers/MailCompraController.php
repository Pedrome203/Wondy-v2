<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\CompraMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailCompraController extends Controller
{
  public function enviarCorreo(User $userId){
    Mail::to($user->email)->send(new Seguimiento($user->id));
    // return redirect()->back()->with(['mensaje' => 'Correo Enviado']);
 }
}
