<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
        }
        nav {
            background: #e60000;
            color: #fff;
            padding: 1rem 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        nav p {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .container {
            max-width: 400px;
            margin: 3rem auto;
            background: #fafafa;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(230,0,0,0.08);
            padding: 2rem 2.5rem 2.5rem 2.5rem;
        }
        h2 {
            color: #e60000;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 1.2rem;
            font-size: 1rem;
        }
        button {
            width: 100%;
            background: #e60000;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 0.9rem;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        button:hover {
            background: #b80000;
        }

    </style>
</head>
<body>
    <nav>
        <ul>
            <p>Vodafone</p>
        </ul>
    </nav>
    <div class="container mx-auto max-w-md mt-12 bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-red-600 mb-2 text-center">Data Leak Check</h2>
        <p class="text-gray-700 mb-6 text-center">Vul je gegevens in om te controleren of ze zijn gelekt.</p>
        <form method="POST" action="/data-check" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-800 font-medium mb-1">Naam</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
            <div>
                <label for="email" class="block text-gray-800 font-medium mb-1">E-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
            <div>
                <label for="ip" class="block text-gray-800 font-medium mb-1">IP-adres</label>
                <input type="text" id="ip" name="ip" value="{{ old('ip', request()->ip()) }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded-md transition">Voer check uit</button>
        </form>
        @if($errors->any())
            <div class="mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative animate-fade-in" role="alert">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 13a1 1 0 01-1 1H3a1 1 0 01-1-1V7a1 1 0 011-1h14a1 1 0 011 1v6zm-2-5H4v4h12V8zm-6 2a1 1 0 112 0 1 1 0 01-2 0z" clip-rule="evenodd"/></svg>
                    <span class="font-semibold">Foutmelding</span>
                </div>
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('result'))
            <div class="mt-6">
                <button type="button" class="w-full flex items-center justify-center bg-red-600 text-white font-semibold py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-400 group transition" onclick="document.getElementById('result-dropdown').classList.toggle('hidden')">
                    <svg class="w-5 h-5 mr-2 text-white group-hover:animate-bounce" fill="currentColor" viewBox="0 0 20 20"><path d="M10 14l-5-5h10l-5 5z"/></svg>
                    Resultaat
                </button>
                <div id="result-dropdown" class="hidden mt-2 bg-red-50 border border-red-200 rounded-lg p-4 animate-fade-in">
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
</body>
</html>
