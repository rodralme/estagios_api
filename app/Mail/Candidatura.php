<?php

namespace App\Mail;

use App\Models\Pessoa;
use App\Models\Usuario;
use App\Models\Vaga;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Candidatura extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Vaga
     */
    public $vaga;
    /**
     * @var Usuario
     */
    public $usuario;
    /**
     * @var Pessoa
     */
    public $pessoa;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Vaga $vaga, Usuario $usuario)
    {
        //
        $this->vaga = $vaga;
        $this->usuario = $usuario;
        $this->pessoa = $usuario->pessoa()->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nome_app = config('app.name');

        $codigo = $this->vaga->id;

        return $this->markdown('emails.candidatura')
            ->subject("${nome_app} - Cadidatura #${codigo}");
    }
}
