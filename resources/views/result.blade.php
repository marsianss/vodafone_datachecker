<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultaat - Data Leak Check</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-red-600 text-white py-4 px-8 shadow">
        <p class="text-xl font-bold tracking-wide m-0">Vodafone</p>
    </nav>
    <div class="container mx-auto max-w-md mt-12 bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-red-600 mb-2 text-center">Data Leak Resultaat</h2>
        <p class="text-gray-700 mb-6 text-center">Hieronder vind je het resultaat van je check.</p>
        @if(session('result'))
            <div class="mt-6">
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 animate-fade-in">
                    <h3 class="text-lg font-bold text-red-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path d="M8.257 3.099c.366-.446.957-.533 1.414-.267.457.267.533.957.267 1.414l-5.5 9.5A1 1 0 005 16h10a1 1 0 00.857-1.514l-5.5-9.5a1 1 0 00-1.414-.267z"/></svg>
                        Gevonden gegevens
                    </h3>
                    <div class="grid grid-cols-1 gap-3 mb-4">
                        <div class="flex items-center justify-between bg-white border border-red-200 rounded-md px-3 py-2">
                            <span class="font-semibold text-gray-800">E-mail</span>
                            <span class="text-gray-700">{{ session('old_email', old('email')) }}</span>
                            <span class="inline-block bg-red-600 text-white text-xs px-2 py-0.5 rounded ml-2">Gelekt</span>
                        </div>
                        <div class="flex items-center justify-between bg-white border border-red-200 rounded-md px-3 py-2">
                            <span class="font-semibold text-gray-800">IP-adres</span>
                            <span class="text-gray-700">{{ session('old_ip', old('ip', request()->ip())) }}</span>
                            <span class="inline-block bg-red-600 text-white text-xs px-2 py-0.5 rounded ml-2">Gelekt</span>
                        </div>
                        <div class="flex items-center justify-between bg-white border border-green-200 rounded-md px-3 py-2">
                            <span class="font-semibold text-gray-800">Naam</span>
                            <span class="text-gray-700">{{ session('old_name', old('name')) }}</span>
                            <span class="inline-block bg-green-600 text-white text-xs px-2 py-0.5 rounded ml-2">Niet gevonden</span>
                        </div>
                    </div>
                    <div class="border-t border-red-200 my-3"></div>
                    <h3 class="text-lg font-bold text-red-700 mb-2 flex items-center"><svg class="w-5 h-5 mr-1 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10.185 2.184a1 1 0 011.63 0l7.5 10.5A1 1 0 0118.5 15H1.5a1 1 0 01-.815-1.816l7.5-10.5a1 1 0 00-1.414-.267z"/></svg> Wat kun je doen?</h3>
                    <ul class="pl-5 list-disc text-sm text-gray-800">
                        <li>Gebruik een VPN om je IP-adres te verbergen.</li>
                        <li>Wijzig je wachtwoorden en gebruik unieke wachtwoorden.</li>
                        <li>Wees alert op phishing e-mails.</li>
                        <li>Controleer of je e-mail op <a href="https://haveibeenpwned.com/" target="_blank" class="underline text-red-700">Have I Been Pwned</a> voorkomt.</li>
                    </ul>
                </div>
            </div>
        @endif
        <div class="mt-8 text-center">
            <a href="/" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded transition">Nieuwe check uitvoeren</a>
        </div>
    </div>
</body>
</html>
