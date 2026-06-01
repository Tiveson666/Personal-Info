@extends('layouts.app')

@section('title', 'Help Center | Developer')

@section('bodyClass', 'bg-slate-950 text-slate-200 antialiased selection:bg-cyan-500/30')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
    </style>
@endpush

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-12">
        <nav class="mb-12 flex justify-between items-center">
            <a href="{{ url('profil') }}" class="text-slate-400 hover:text-cyan-400 font-mono text-sm flex items-center gap-2 transition w-fit">
                <span>&larr;</span> cd .. /home
            </a>
            <span class="text-xs font-mono text-slate-600">v1.0.0</span>
        </nav>

        <header class="mb-12 text-center md:text-left">
            <h1 class="text-4xl font-bold text-white mb-4 tracking-tight">
                Need <span class="text-cyan-400 font-mono">sudo help?</span>
            </h1>
            <p class="text-slate-400 text-lg">Temukan jawaban untuk pertanyaan umum atau hubungi saya langsung.</p>
        </header>

        <div class="mb-12 relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-slate-500 group-focus-within:text-cyan-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" 
                class="w-full bg-slate-900 border border-slate-800 rounded-xl pl-12 pr-4 py-4 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition placeholder-slate-600 font-mono text-sm"
                placeholder="Search documentation or FAQs...">
        </div>

        <main>
            <h2 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-6 font-mono">Frequently Asked Questions</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-slate-900 border border-slate-800 p-6 rounded-xl hover:border-cyan-500/50 transition duration-300">
                    <h3 class="text-white font-semibold mb-2 flex items-start gap-2">
                        <span class="text-cyan-400 font-mono text-lg leading-none">></span>
                        Apakah Anda menerima proyek freelance?
                    </h3>
                    <p class="text-slate-400 text-sm leading-relaxed pl-4 border-l border-slate-800 ml-1">
                        Ya, saya menerima proyek freelance tergantung pada ketersediaan waktu dan kecocokan teknologi yang digunakan. Silakan kirimkan detail proyek Anda melalui halaman kontak.
                    </p>
                </div>

                <div class="bg-slate-900 border border-slate-800 p-6 rounded-xl hover:border-cyan-500/50 transition duration-300">
                    <h3 class="text-white font-semibold mb-2 flex items-start gap-2">
                        <span class="text-cyan-400 font-mono text-lg leading-none">></span>
                        Tech stack apa yang biasa digunakan?
                    </h3>
                    <p class="text-slate-400 text-sm leading-relaxed pl-4 border-l border-slate-800 ml-1">
                        Untuk backend saya utamanya menggunakan <span class="text-slate-200">Laravel</span> atau <span class="text-slate-200">Node.js</span>. Sedangkan frontend menggunakan <span class="text-slate-200">React</span>, <span class="text-slate-200">Vue</span>, dan <span class="text-slate-200">Tailwind CSS</span>.
                    </p>
                </div>

                <div class="bg-slate-900 border border-slate-800 p-6 rounded-xl hover:border-cyan-500/50 transition duration-300">
                    <h3 class="text-white font-semibold mb-2 flex items-start gap-2">
                        <span class="text-cyan-400 font-mono text-lg leading-none">></span>
                        Berapa estimasi pengerjaan sebuah web?
                    </h3>
                    <p class="text-slate-400 text-sm leading-relaxed pl-4 border-l border-slate-800 ml-1">
                        Estimasi waktu sangat bergantung pada kompleksitas fitur, jumlah halaman, dan kesiapan aset (desain/konten). Rata-rata proyek memakan waktu 2 hingga 8 minggu.
                    </p>
                </div>

                <div class="bg-slate-900 border border-slate-800 p-6 rounded-xl hover:border-cyan-500/50 transition duration-300">
                    <h3 class="text-white font-semibold mb-2 flex items-start gap-2">
                        <span class="text-cyan-400 font-mono text-lg leading-none">></span>
                        Di mana saya bisa melihat source code proyek Anda?
                    </h3>
                    <p class="text-slate-400 text-sm leading-relaxed pl-4 border-l border-slate-800 ml-1">
                        Beberapa proyek open-source dan eksperimen kode saya tersedia secara publik di akun GitHub saya. Anda bisa menemukannya di tautan profil utama.
                    </p>
                </div>

            </div>

            <div class="mt-16 p-8 bg-gradient-to-br from-slate-900 to-slate-950 border border-slate-800 rounded-2xl text-center">
                <h2 class="text-xl font-bold text-white mb-2">Masih mengalami kendala?</h2>
                <p class="text-slate-400 mb-6 text-sm">Jangan ragu untuk menghubungi saya secara langsung. Saya akan membalas secepat mungkin (biasanya kurang dari 24 jam).</p>
                
                <a href="{{ url('/contact') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-slate-800 hover:bg-cyan-600 text-white font-mono text-sm rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 focus:ring-offset-slate-950 border border-slate-700 hover:border-cyan-500">
                    <span>> init_contact()</span>
                </a>
            </div>
        </main>

        <footer class="mt-20 pt-8 border-t border-slate-900 text-center flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-600 text-sm font-mono">
                &copy; {{ date('Y') }} Built with Laravel & Tailwind.
            </p>
            <div class="flex gap-4 font-mono text-xs text-slate-600">
                <a href="#" class="hover:text-cyan-400 transition">Terms</a>
                <a href="#" class="hover:text-cyan-400 transition">Privacy</a>
            </div>
        </footer>
    </div>
@endsection