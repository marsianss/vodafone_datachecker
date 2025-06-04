<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/data-check', function (\Illuminate\Http\Request $request) {
    return redirect('/result')
        ->with('result', [
            'type' => 'danger',
            'message' => '<strong><i class="bi bi-exclamation-triangle-fill"></i> Gevaar!</strong> Uw e-mailadres en IP-adres zijn publiekelijk op het internet gevonden. <br>Advies: Gebruik een VPN, wijzig uw wachtwoorden en wees alert op phishing.'
        ])
        ->with('old_email', $request->input('email'))
        ->with('old_ip', $request->input('ip'))
        ->with('old_name', $request->input('name'));
});

Route::get('/result', function () {
    return view('result');
});
