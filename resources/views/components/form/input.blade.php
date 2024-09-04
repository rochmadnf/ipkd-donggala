<div class="space-y-1.5">
    <div class="flex flex-col gap-y-2.5">
        <label for="{{ $name }}" class="text-sm font-medium leading-none">{{ $label }}</label>
        <input
            {{
                $attributes
                    ->class([
                        'flex h-10 w-full rounded-md border border-gray-300/80 bg-white px-3 py-2 text-sm ring-offset-white file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50',
                    ])
                    ->merge(['type' => $type ?? 'text', 'id' => $name, 'name' => $name, 'value' => old($name) ?? ($value ?? '')])
            }}
        />
    </div>
    @error($name)
        <small class="text-xs text-red-500">{{ $message }}</small>
    @enderror
</div>
