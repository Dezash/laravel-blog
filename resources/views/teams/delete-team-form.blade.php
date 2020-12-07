<x-jet-action-section>
    <x-slot name="title">
        {{ __('Ištrinti Komandą') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Visam laikui ištrinti komandą') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Kai komanda ištrinama, visi jos resūrsai dings visam laikui.') }}
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                {{ __('Ištrinti Komandą') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete Team Confirmation Modal -->
        <x-jet-confirmation-modal wire:model="confirmingTeamDeletion">
            <x-slot name="title">
                {{ __('Ištrinti Komandą') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Ar esate tikri, kad norite ištrinti šia komandą?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingTeamDeletion')" wire:loading.attr="disabled">
                    {{ __('Apsigalvojau') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteTeam" wire:loading.attr="disabled">
                    {{ __('Ištrinti Komandą') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </x-slot>
</x-jet-action-section>
