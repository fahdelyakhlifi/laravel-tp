<div>
    <tbody class="divide-y divide-gray-300">
        @foreach ($products as $product)
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-3 font-semibold text-gray-900">
                    {{ $product->title }}
                </td>

                <td class="px-4 py-3 text-center text-gray-700">
                    {{ $product->description }}
                </td>

                <td class="px-4 py-3 font-medium text-center text-gray-800">
                    {{ $product->newPrice }} dh
                    @if ($product->discount > 0)
                        <span class="ml-2 text-gray-500 line-through">
                            {{ $product->price }} dh
                        </span>
                    @endif
                </td>

                <td class="px-4 py-3 space-x-2 text-center">

                    <a href="{{ route('products.edit', $product->id) }}"
                        class="px-3 py-1 text-white transition bg-blue-500 rounded hover:bg-blue-700"
                        style="margin-right: 10px;">
                        Modifier
                    </a>

                    <a href="{{ route('products.show', $product->id) }}"
                        class="px-3 py-1 text-white transition bg-green-500 rounded hover:bg-green-700"
                        style="margin-right: 10px;">
                        Détails
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1 text-white transition bg-red-500 rounded hover:bg-red-700">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</div>








{{-- code sans design --}}
{{-- <table id="table-result">
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>
                {{ $product->title }}
            </td>
            <td>
                {{ $product->description }}
            </td>
            <td>
                {{ $product->newPrice }} dh
                @if ($product->discount > 0)
                <span>
                    {{ $product->price }} dh
                </span>
                @endif
            </td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">
                    Modifier
                </a>
                <a href="{{ route('products.show', $product->id) }}">
                    Détails
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> --}}