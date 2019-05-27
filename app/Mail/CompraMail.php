<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Producto;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompraMail extends Mailable
{
    use Queueable, SerializesModels;
    public $productos;
    public $user;
    public $total;
    public $fecha;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$productos,$precio)
    {
      $this->productos = $productos;
      $this->user = $user;
      $this->precio = $precio;
      $this->fecha = \Carbon\Carbon::now();
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.compra');
    }
}
