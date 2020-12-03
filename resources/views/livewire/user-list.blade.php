<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Vartotojai
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <x-jet-input type="text" class="block mt-1" placeholder="Ieškoti" wire:model="searchTerm" />
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Vardas</th>
                        <th class="px-4 py-2">El. paštas</th>
                        <th class="px-4 py-2">Veiksmai</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="edit({{ $user->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Redaguoti</button>
                            <button wire:click="delete({{ $user->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Pašalinti</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
