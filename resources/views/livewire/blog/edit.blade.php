<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Staipsnio redagavimas
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-2xl bg-gray-50 py-10 px-5 m-auto w-full mt-10">
        <x-jet-validation-errors class="mb-4" />

        <form wire:submit.prevent="save">
            @csrf

            <div>
                <x-jet-label for="title" value="Antraštė" />
                <x-jet-input wire:model="title" value="{{ $title }}" id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="category" value="Kategorija" />
                <select wire:model="category_id" name="category_id" id="category" class="form-select rounded-md shadow-sm mt-1 block w-full">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="nature" value="Pobūdis" />
                <x-jet-input wire:model="nature" value="{{ $nature }}" id="nature" class="block mt-1 w-full" name="nature" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="keyword-search" value="Raktažodžiai" />
                <x-jet-input wire:keydown.enter.prevent="addKeyword" wire:model="inputKeyword" id="keyword-search" class="block mt-1 w-full" name="keyword-search" />
            </div>

            @foreach($keywords as $keyword)
            @livewire('chip', ['title' => $keyword], key($keyword))
            @endforeach

            <div class="mt-4">
                <x-jet-label value="Turinys" />
                @push('styles')
                <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                @endpush
                @push('scripts')
                <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                @endpush

                <script>
                    function quillEditor(data) {
                        return {
                            instance: null,
                            init() {
                                this.$nextTick(() => {
                                    this.instance = new Quill(this.$refs.editor, {
                                        theme: 'snow'
                                    });

                                    this.instance.on('text-change', () => {
                                        this.$refs.input.dispatchEvent(new CustomEvent('input', {
                                            detail: this.instance.root.innerHTML
                                        }));
                                    })
                                })
                            },
                            ...data
                        }
                    }
                </script>

                <div x-data="quillEditor({})" x-init="init()">
                    <input type="hidden" x-ref="input" wire:model="body">

                    <div wire:ignore>
                        <div x-ref="editor">{!! $body !!}</div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    Atnaujinti
                </x-jet-button>
            </div>
        </form>
    </div>
</div>