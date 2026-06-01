@extends('layouts.app')

@section('title', 'Contact | Developer')

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
        <nav class="mb-12">
            <a href="{{ url('profil') }}" class="text-slate-400 hover:text-cyan-400 font-mono text-sm flex items-center gap-2 transition w-fit">
                <span>&larr;</span> cd .. /profile
            </a>
        </nav>

        <header class="mb-12">
            <h1 class="text-4xl font-bold text-white mb-2 tracking-tight">
                Let's <span class="text-cyan-400 font-mono">Connect();</span>
            </h1>
            <p class="text-slate-400">Punya proyek yang ingin didiskusikan atau sekadar ingin menyapa? Silakan isi form di bawah.</p>
        </header>

        <main class="grid grid-cols-1 md:grid-cols-3 gap-12">
            
            <div class="space-y-8 md:col-span-1">
                <section>
                    <h2 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4 font-mono">Direct Contact</h2>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs text-slate-500 font-mono mb-1">Email</p>
                            <a href="mailto:muhammad.fikri.rahmadan@students.amikom.ac.id" class="text-slate-300 hover:text-cyan-400 transition">madefikri12@gmail.com</a>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-mono mb-1">Instagram</p>
                            <a href="https://www.instagram.com/mohd.fikri105" class="text-slate-300 hover:text-cyan-400 transition">@mohd.fikri105</a>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-mono mb-1">Location</p>
                            <p class="text-slate-300">Yogyakarta, ID</p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="md:col-span-2">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/50 rounded-lg text-emerald-400 text-sm font-mono">
                        > Message sent successfully!
                    </div>
                @endif

                <form action="#" method="POST" class="space-y-6">
                    @csrf 

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-mono text-slate-400">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full bg-slate-900 border border-slate-800 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition placeholder-slate-600"
                                placeholder="John Doe">
                            @error('name')
                                <p class="text-red-400 text-xs font-mono">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-mono text-slate-400">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full bg-slate-900 border border-slate-800 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition placeholder-slate-600"
                                placeholder="john@example.com">
                            @error('email')
                                <p class="text-red-400 text-xs font-mono">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="subject" class="block text-sm font-mono text-slate-400">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                            class="w-full bg-slate-900 border border-slate-800 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition placeholder-slate-600"
                            placeholder="Project Inquiry">
                        @error('subject')
                            <p class="text-red-400 text-xs font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="message" class="block text-sm font-mono text-slate-400">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full bg-slate-900 border border-slate-800 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition placeholder-slate-600 resize-none"
                            placeholder="Hello, I'd like to talk about...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-400 text-xs font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" 
                        class="w-full md:w-auto px-8 py-3 bg-cyan-600 hover:bg-cyan-500 text-white font-mono text-sm rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 focus:ring-offset-slate-950 flex items-center justify-center gap-2">
                        <span>Send Message</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>
            </div>
        </main>

        <footer class="mt-20 pt-8 border-t border-slate-900 text-center">
            <p class="text-slate-600 text-sm font-mono">
                &copy; {{ date('Y') }} Built with Laravel & Tailwind.
            </p>
        </footer>
    </div>

</body>
</html>