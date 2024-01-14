<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full border border-gray-200">
                        <thead>
                            <tr>
                                <th class="border-b">Buyer Email</th>
                                <th class="border-b">Buyer Name</th>
                                <th class="border-b">Status</th>
                                <th class="border-b">Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderData as $result)
                                <tr>
                                    <td class="border-b">{{ $result['buyer_email'] }}</td>
                                    <td class="border-b">{{ $result['name'] }}</td>
                                    <td class="border-b">{{ $result['status'] }}</td>
                                    <td class="border-b">{{ $result['payment_method'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    @if($page > 1)
                        <a href="{{ route('view.data', ['page' => $page - 1]) }}" class="text-blue-500 hover:underline">Previous</a>
                    @endif
            
                    @if(count($orderData) === $limit)
                        <a href="{{ route('view.data', ['page' => $page + 1]) }}" class="text-blue-500 hover:underline">Next</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
