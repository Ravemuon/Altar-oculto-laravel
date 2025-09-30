<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// COMANDO ARTISAN PERSONALIZADO
Artisan::command('inspire', function () {
    // Mostra uma frase inspiradora no terminal
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote'); // descrição do comando
