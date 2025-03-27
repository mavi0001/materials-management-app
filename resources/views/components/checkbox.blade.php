<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    @props(['name', 'checked' => false])

    <input type="checkbox"
    name="{{ $name }}"
    {{ $checked ? 'checked' : '' }}
    {{ $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500']) }}>
</div>

