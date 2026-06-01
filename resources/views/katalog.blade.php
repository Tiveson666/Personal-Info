@extends('layouts.app')

@section('title', 'Catalog | Developer')

@section('bodyClass', 'bg-slate-950 text-slate-200 antialiased selection:bg-cyan-500/30')

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        /* Smooth image hover effect */
        .img-hover-zoom:hover img { transform: scale(1.05); }
    </style>
@endpush

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-12">
        <nav class="mb-12 flex justify-between items-center">
            <a href="{{ url('profil') }}" class="text-slate-400 hover:text-cyan-400 font-mono text-sm flex items-center gap-2 transition w-fit">
                <span>&larr;</span> cd .. /home
            </a>
            <span class="text-xs font-mono text-slate-600">ls -la ./catalog</span>
        </nav>

        <header class="mb-12">
            <h1 class="text-4xl font-bold text-white mb-4 tracking-tight">
                Project <span class="text-cyan-400 font-mono">Catalog[];</span>
            </h1>
            <p class="text-slate-400 text-lg max-w-2xl">Kumpulan produk digital, proyek open-source, dan layanan pengembangan web yang tersedia.</p>
        </header>

        <div class="mb-10 flex flex-wrap gap-3">
            <button class="px-4 py-2 bg-cyan-900/30 text-cyan-400 border border-cyan-500/50 rounded-lg text-sm font-mono transition">All</button>
            <button class="px-4 py-2 bg-slate-900 text-slate-400 border border-slate-800 hover:border-cyan-500/50 hover:text-cyan-400 rounded-lg text-sm font-mono transition">Web Apps</button>
            <button class="px-4 py-2 bg-slate-900 text-slate-400 border border-slate-800 hover:border-cyan-500/50 hover:text-cyan-400 rounded-lg text-sm font-mono transition">UI Kits</button>
            <button class="px-4 py-2 bg-slate-900 text-slate-400 border border-slate-800 hover:border-cyan-500/50 hover:text-cyan-400 rounded-lg text-sm font-mono transition">Open Source</button>
        </div>

        <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <article class="group bg-slate-900 border border-slate-800 rounded-xl overflow-hidden hover:border-cyan-500/50 transition duration-300 flex flex-col">
                <div class="h-48 bg-slate-800 relative overflow-hidden img-hover-zoom">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center">
                        <span class="text-slate-700 font-mono text-4xl">&lt;/&gt;</span>
                    </div>
                    <div class="absolute top-3 right-3 bg-slate-950/80 backdrop-blur px-2 py-1 rounded text-xs font-mono text-cyan-400 border border-slate-700">Premium</div>
                </div>
                
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-cyan-400 transition">SaaS Admin Dashboard</h3>
                    <p class="text-sm text-slate-400 mb-6 flex-grow">Template dashboard admin lengkap dengan integrasi chart, tabel dinamis, dan sistem autentikasi.</p>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-2 py-1 bg-slate-950 border border-slate-800 rounded text-xs text-slate-400">Laravel</span>
                        <span class="px-2 py-1 bg-slate-950 border border-slate-800 rounded text-xs text-slate-400">Vue.js</span>
                        <span class="px-2 py-1 bg-slate-950 border border-slate-800 rounded text-xs text-slate-400">Tailwind</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-slate-800 mt-auto">
                        <span class="text-lg font-bold text-white">$49</span>
                        <a href="#" class="px-4 py-2 bg-slate-800 hover:bg-cyan-600 text-white text-sm font-mono rounded transition focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 focus:ring-offset-slate-900">
                            Details
                        </a>
                    </div>
                </div>
            </article>

            <article class="group bg-slate-900 border border-slate-800 rounded-xl overflow-hidden hover:border-cyan-500/50 transition duration-300 flex flex-col">
                <div class="h-48 bg-slate-800 relative overflow-hidden img-hover-zoom">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center">
                        <svg class="w-12 h-12 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div class="absolute top-3 right-3 bg-slate-950/80 backdrop-blur px-2 py-1 rounded text-xs font-mono text-emerald-400 border border-slate-700">Open Source</div>
                </div>
                
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-cyan-400 transition">E-Commerce REST API</h3>
                    <p class="text-sm text-slate-400 mb-6 flex-grow">Boilerplate REST API untuk toko online. Mendukung JWT auth, keranjang belanja, dan integrasi payment gateway.</p>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-2 py-1 bg-slate-950 border border-slate-800 rounded text-xs text-slate-400">Node.js</span>
                        <span class="px-2 py-1 bg-slate-950 border border-slate-800 rounded text-xs text-slate-400">Express</span>
                        <span class="px-2 py-1 bg-slate-950 border border-slate-800 rounded text-xs text-slate-400">MongoDB</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-slate-800 mt-auto">
                        <span class="text-sm font-mono text-slate-400">Free</span>
                        <a href="#" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-sm font-mono rounded transition flex items-center gap-2">
                            <span>GitHub</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"></path></svg>
                        </a>
                    </div>
                </div>
            </article>

            <article class="group bg-slate-900 border border-slate-800 rounded-xl overflow-hidden hover:border-cyan-500/50 transition duration-300 flex flex-col">
                <div class="h-48 bg-slate-800 relative overflow-hidden img-hover-zoom">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center">
                        <svg class="w-12 h-12 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                    </div>
                </div>
                
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-cyan-400 transition">Techy UI Kit</h3>
                    <p class="text-sm text-slate-400 mb-6 flex-grow">Kumpulan komponen UI bergaya dark mode untuk Figma dan HTML. Cocok untuk website portofolio atau dokumentasi.</p>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-2 py-1 bg-slate-950 border border-slate-800 rounded text-xs text-slate-400">Figma</span>
                        <span class="px-2 py-1 bg-slate-950 border border-slate-800 rounded text-xs text-slate-400">HTML/CSS</span>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-slate-800 mt-auto">
                        <span class="text-lg font-bold text-white">$19</span>
                        <a href="#" class="px-4 py-2 bg-slate-800 hover:bg-cyan-600 text-white text-sm font-mono rounded transition focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 focus:ring-offset-slate-900">
                            Details
                        </a>
                    </div>
                </div>
            </article>

        </main>

        <div class="mt-16 text-center border-t border-slate-900 pt-12">
            <h3 class="text-xl font-bold text-white mb-4">Tidak menemukan apa yang Anda cari?</h3>
            <p class="text-slate-400 mb-6 text-sm">Saya juga menerima proyek custom atau modifikasi dari produk di atas.</p>
            <a href="{{ url('/contact') }}" class="text-cyan-400 hover:text-cyan-300 font-mono text-sm underline decoration-slate-700 hover:decoration-cyan-400 transition">
                > Hubungi untuk proyek custom
            </a>
        </div>

        <footer class="mt-16 pt-8 border-t border-slate-900 text-center">
            <p class="text-slate-600 text-sm font-mono">
                &copy; {{ date('Y') }} Built with Laravel & Tailwind.
            </p>
        </footer>
    </div>
@endsection