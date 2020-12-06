<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Straipsniai
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Sukurti naują</button>
            @if($isOpen)
                @include('livewire.blogadmin.create')
            @endif

            <x-jet-input type="text" class="block mt-1" placeholder="Ieškoti" wire:model="searchTerm" />
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">Nr.</th>
                        <th class="px-4 py-2">Antraštė</th>
                        <th class="px-4 py-2">Autorius</th>
                        <th class="px-4 py-2">Statusas</th>
                        <th class="px-4 py-2">Veiksmai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td class="border px-4 py-2">{{ $blog->id }}</td>
                        <td class="border px-4 py-2">{{ $blog->title }}</td>
                        <td class="border px-4 py-2">{{ $blog->author ? $blog->author->name : 'Autoriaus sistemoje nebėra' }}</td>
                        <td class="border px-4 py-2">{{ $blog->state == "SUBMITTED" ? 'Recenzuojamas' : ($blog->state == "APPROVED" ? 'Patvirtintas' : 'Atmestas') }}</td>
                        <td class="border px-4 py-2">
                        
                        <button wire:click="edit({{ $blog->id }})" class="disabled:opacity-50 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"@cannot('update', $blog) disabled @endcannot>Redaguoti</button>
                        <button wire:click="delete({{ $blog->id }})" class="disabled:opacity-50 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"@cannot('delete', $blog) disabled @endcannot>Ištrinti</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $blogs->links() }}
        </div>
    </div>
</div>