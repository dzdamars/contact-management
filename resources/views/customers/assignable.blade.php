<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Assign Contact to Agent') }}
            </h2>
    </x-slot>

    <div class="py-12">
            <!-- Session Status -->
    <x-auth-session-status class="flex justify-center mb-4" :status="session('status')" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <div>
                        <table class="table-auto border-separate border-green-800">
                            <thead>
                                <tr>
                                    <th >Name</th>
                                    <th >Email</th>
                                    <th >Phone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="p-8">
                                            {{$customer->name}}
                                        </td>
                                        <td class="p-8">
                                            {{$customer->email}}</td>
                                        <td class="p-10">
                                            {{$customer->phone}}</td>
                                        <td class="p-8"> 
                                            <x-button 
                                                class="bg-blue-500 hover:bg-blue-700" 
                                                onclick="location.href='{{route('taskslockcreate', ['cust_id'=>$customer->id])}}'" type="button">
                                                assign
                                            </x-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <div class="my-3">
                                {{ $customers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
