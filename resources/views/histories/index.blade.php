<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('History List') }}
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <div>
                        <table class="table-auto border-separate border-green-800">
                            <thead>
                                <tr>
                                    <th >Contact Name</th>
                                    <th >Agent Assigned</th>
                                    <th >Status</th>
                                    <th >Remarks</th>
                                    <th >Log's time</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($histories as $history)
                                    <tr>
                                        <td class="p-8">
                                            {{$history->task->customer->name}}
                                        </td>
                                        <td class="p-8">
                                            {{$history->task->agent->name}}</td>
                                        <td class="p-8">
                                            {{$history->stat}}</td>
                                        <td class="p-8">
                                            {{$history->remarks}}</td>
                                        <td class="p-8">
                                            {{$history->created_at}}</td>
                                        <!-- <td> 
                                            <form action="/histories/{{$history->id}}" method="post">
                                                <button 
                                                    class="bg-yellow-500 hover:bg-yellow-700 border-2" 
                                                    onclick="location.href='/histories/{{$history->id}}/edit'" type="button">
                                                    edit
                                                </button>
                                            @csrf @method('DELETE')
                                                <button 
                                                    class="bg-red-500 hover:bg-red-700 border-2" 
                                                    type="submit">
                                                    clear
                                                </button>
                                            </form>
                                        </td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <div class="my-3">
                                {{ $histories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
