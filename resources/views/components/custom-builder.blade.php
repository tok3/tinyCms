<div x-data="{ open: true }">
    <button @click="open = !open">Toggle</button>

    <div x-show="open">
        {{ $slot }}
    </div>
</div>
