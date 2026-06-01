@extends('layouts.app')

@section('title', 'Profile Developer | ' . ($name ?? 'Muhammad Fikri Rahmadan'))

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
        <header class="flex flex-col md:flex-row items-center gap-8 mb-16">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-1000"></div>
                <img src="{{ asset('images/me.jpeg') }}" 
                     alt="Profile Picture" 
                     class="relative w-32 h-32 md:w-30 md:h-40 rounded-full border-2 border-slate-800 object-cover">
            </div>

            <div class="text-center md:text-left">
                <h1 class="text-4xl font-bold text-white mb-2 tracking-tight">
                    Muhammad <span class="text-cyan-400 font-mono">Fikri Rahmadan</span>
                </h1>
                <p class="text-xl text-slate-400 mb-4">Learning Fullstack Developer & UI Enthusiast</p>
                <div class="flex gap-3 justify-center md:justify-start">
                    <span class="px-3 py-1 text-xs font-mono bg-slate-900 border border-slate-700 rounded-full text-cyan-400">Available for Work</span>
                    <span class="px-3 py-1 text-xs font-mono bg-slate-900 border border-slate-700 rounded-full text-slate-400">Yogyakarta, ID</span>
                    <span class="px-3 py-1 text-xs font-mono bg-slate-900 border border-slate-700 rounded-full text-cyan-400">Undergraduate Information System</span>
                </div>
            </div>
        </header>

        <main class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="space-y-8">
                <section>
                    <h2 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4 font-mono">Connect</h2>
                    <ul class="space-y-3">
                        <li><a href="https://github.com/Tiveson666" class="text-slate-400 hover:text-cyan-400 transition">GitHub</a></li>
                        <li><a href="https://www.linkedin.com/in/muhammad-fikri-rahmadan/" class="text-slate-400 hover:text-cyan-400 transition">LinkedIn</a></li>
                        <li><a href="https://www.instagram.com/mohd.fikri105/" class="text-slate-400 hover:text-cyan-400 transition">instagram</a></li>
                        <li><a href="/kontak" class="text-slate-400 hover:text-cyan-400 transition">Kontak</a></li>
                        <!-- <li><a href="/katalog" class="text-slate-400 hover:text-cyan-400 transition">Katalog</a></li> -->
                        <!-- <li><a href="/bantuan" class="text-slate-400 hover:text-cyan-400 transition">Bantuan</a></li> -->
                    </ul>
                </section>

                <section>
                    <h2 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4 font-mono">Tech Stack</h2>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 bg-slate-900 border border-slate-800 rounded text-sm hover:border-cyan-500/50 transition cursor-default">Laravel</span>
                        <span class="px-2 py-1 bg-slate-900 border border-slate-800 rounded text-sm hover:border-cyan-500/50 transition cursor-default">Tailwind</span>
                        <span class="px-2 py-1 bg-slate-900 border border-slate-800 rounded text-sm hover:border-cyan-500/50 transition cursor-default">React</span>
                        <span class="px-2 py-1 bg-slate-900 border border-slate-800 rounded text-sm hover:border-cyan-500/50 transition cursor-default">MySQL</span>
                        <span class="px-2 py-1 bg-slate-900 border border-slate-800 rounded text-sm hover:border-cyan-500/50 transition cursor-default">Git</span>
                    </div>
                </section>
            </div>

            <div class="md:col-span-2 space-y-12">
                <section>
                    <h2 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4 font-mono">About Me</h2>
                    <p class="text-slate-400 leading-relaxed">
                        Halo! Saya adalah seorang pengembang web yang fokus pada pembuatan aplikasi yang bersih, efisien, dan skalabel. Saya suka mengeksplorasi teknologi baru dan menerapkannya dalam proyek dunia nyata. Pengalaman saya mencakup pengembangan backend dengan <span class="text-white">Laravel</span> dan frontend modern menggunakan <span class="text-white">Tailwind CSS</span>.
                    </p>
                </section>

                <section>
                    <h2 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-6 font-mono">Recent Projects</h2>
                    <div class="space-y-6">
                        <div class="group p-4 -ml-4 rounded-xl hover:bg-slate-900/50 transition">
                            <h3 class="text-white font-semibold mb-1 group-hover:text-cyan-400 transition">Project Semester 3 PWL [RenGo]</h3>
                            <p class="text-sm text-slate-500 mb-2 font-mono">Laravel • Redis • PostgreSQL</p>
                            <p class="text-slate-400 text-sm">Membangun sistem pemesanan atau reservasi kendaraan online, dengan full transaksi melalui web.</p>
                        </div>
                        
                        <div class="group p-4 -ml-4 rounded-xl hover:bg-slate-900/50 transition">
                            <h3 class="text-white font-semibold mb-1 group-hover:text-cyan-400 transition">Portfolio Dashboard</h3>
                            <p class="text-sm text-slate-500 mb-2 font-mono">React • Tailwind • Vite</p>
                            <p class="text-slate-400 text-sm">Dashboard admin Interaktif.</p>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <footer class="mt-20 pt-8 border-t border-slate-900 text-center">
            <p class="text-slate-600 text-sm font-mono">
                &copy; {{ date('Y') }} Built with Laravel & Tailwind.
            </p>
        </footer>
    </div>
@endsection