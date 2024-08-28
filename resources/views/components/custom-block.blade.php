<div class="grid grid-cols-12 gap-4">
    <div class="col-span-10">
        <!-- Heading Input -->
        <input type="text" class="form-input w-full" name="blocks[{{ $index }}][heading]" placeholder="Heading" value="{{ $block['heading'] ?? '' }}">
    </div>
    <div class="col-span-2">
        <!-- Level Dropdown -->
        <select class="form-select w-full" name="blocks[{{ $index }}][level]">
            <option value="h1" @selected($block['level'] ?? '' == 'h1')>H1</option>
            <option value="h2" @selected($block['level'] ?? '' == 'h2')>H2</option>
            <!-- Weitere Optionen -->
        </select>
    </div>
</div>
