<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Follow Up\'s Task List') }}
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
                                    <th >Assigned Agent</th>
                                    <th >Status</th>
                                    <th >Remarks</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($data as $task)
                                    <tr>
                                        <td class="px-8">
                                            <a href="/customers/{{$task->agent->id}}/edit">
                                                {{$task->customer->name}}
                                            </a>
                                        </td>
                                        <td class="p-8">
                                            {{$task->agent->detail->name ?? $task->agent->name}}
                                        </td>
                                        <td class="p-8">
                                            {{$task->stat}}
                                        </td >
                                        <td class="p-8">
                                            {{$task->remarks ?? "-"}}
                                        </td>
                                        <td> 
                                            @if (Auth::user()->id == $task->agent_id)
                                                <x-button 
                                                    class="bg-yellow-500 hover:bg-yellow-700 border-2" 
                                                    onclick="location.href='/tasks/{{$task->id}}/edit'" type="button">
                                                    Status Update
                                                </x-button>
                                            @endif
                                            <!-- <form action="/datas/{{$task->id}}" method="post">
                                            @csrf @method('DELETE')
                                                <button 
                                                    class="bg-red-500 hover:bg-red-700 border-2" 
                                                    type="submit">
                                                    clear
                                                </button>
                                            </form> -->

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <div class="my-3">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
