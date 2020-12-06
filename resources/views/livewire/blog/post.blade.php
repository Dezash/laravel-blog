<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Straipsnis - {{ $post->title  }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Post Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="w-full flex flex-col shadow my-4">
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->category->name }}</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                    <p href="#" class="text-sm pb-8">
                        <a href="#" class="font-semibold hover:text-gray-800">{{ $post->author ? $post->author->name : 'Autoriaus sistemoje nebėra' }}</a>, Publikuota {{ $post->created_at }}
                    </p>
                    <div>{!! $post->body !!}</div>
                </div>
            </article>

            <div class="w-full flex pt-6">
                @if($previous)
                <a href="/blog/{{ $previous->id }}" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Praitas</p>
                    <p class="pt-2">{{ $previous->title }}</p>
                </a>
                @endif
                @if($next)
                <a href="/blog/{{ $next->id }}" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Kitas <i class="fas fa-arrow-right pl-1"></i></p>
                    <p class="pt-2">{{ $next->title }}</p>
                </a>
                @endif
            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Rašyti staipsnį</p>
                <p class="pb-2">Čia galite sukurti savo staipsnį. Jūsų staipsnis bus patikrintas mūsų recenzentų prieš jį publikuojant.</p>
                <a href="/blog/post" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Sukurti straipsnį
                </a>
            </div>

        </aside>
    </div>
</div>