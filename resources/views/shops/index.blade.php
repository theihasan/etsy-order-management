<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shops') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full border border-gray-200">
                        <thead>
                            <tr>
                                <th class="border-b">ID</th>
                                <th class="border-b">Shop ID</th>
                                <th class="border-b">View Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shops as $data)
                                <tr>
                                    <td class="border-b">{{ $data->id }}</td>
                                    <td class="border-b">{{ $data->shop_id }}</td>
                                    <td class="border-b">
                                        <a href="{{ route('orders.index', $data->shop_id) }}" class="text-blue-500">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
