<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Straipsniai
    </h2>
</x-slot>
<div class="py-12">
    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a
                href="#"
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open"
            >
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                @foreach($categories as $category)
                <a href="/blog?cat={{ $category->name }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            @foreach($blogs as $blog)
            <article class="w-full flex flex-col shadow my-4">
                <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $blog->category->name }}</a>
                <a href="/blog/{{ $blog->id }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $blog->title }}</a>
                    <p class="text-sm pb-3">
                    {{ $blog->author->name }}, {{ $blog->created_at }}
                    </p>
                    <div>{!! $blog->body !!}</div>
                    
                    <a href="#" class="uppercase text-gray-800 hover:text-black mt-2">Skaityti toliau <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            @endforeach

            {{ $blogs->links() }}

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Rašyti staipsnį</p>
                <p class="pb-2">Čia galite sukurti savo staipsnį. Jūsų staipsnis bus patikrintas mūsų recenzentų prieš jį publikuojant.</p>
                <a href="/blog/post" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Sukurti staipsnį
                </a>
            </div>

        </aside>
    </div>
</div>