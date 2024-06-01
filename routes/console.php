<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('app:generer-horaire')
    ->yearly();
Schedule::command("app:check-presence")->hourly();
Schedule::command("app:creer-solde-conge")->yearly();
