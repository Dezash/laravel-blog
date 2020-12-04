<div class="inline-flex items-center rounded-full bg-white border border-gray-200 p-px">
    <div>
        <span class="px-1 text-sm">{{ $title ?? "N/A" }}</span>
        <button
            type="button"
            wire:click="$emit('keywordRemoved', '{{ $title }}')"
            class="h-6 w-6 p-1 rounded-full bg-red-400 bg-opacity-25 focus:outline-none"
        >
        <svg
            class="text-red-500 text-opacity-75"
            fill="currentColor"
            viewBox="0 0 20 20"
        >
            <path
            fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"
            ></path>
        </svg>
        </button>
    </div>
</div>