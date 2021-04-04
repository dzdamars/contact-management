<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Follow Up Status') }}
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <form action="{{route('tasks.update',['task' => $task->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <div>
                                <table>
                                    <tr>
                                        <td class="text-right"><label for="">Customer's Name</label></td>
                                        <td class="w-2/3"><input class="mx-6" type="text" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') ?? $task->customer->name }}" disabled></td>
                                    </tr>
                                    @error('name')
                                        <tr>
                                            <td></td>
                                            <td class="alert fill-current text-red-800">{{ $message }}</td>
                                        </tr>
                                    @enderror
                                    <tr>
                                        <td class="text-right mx-8"><label for="">Agent on Duty</label> </td>
                                        <td><input class="mx-6" type="text" name="agent" class="@error('agent') is-invalid @enderror" value="{{ old('agent') ?? $task->agent->name }}" disabled></td>
                                    </tr>
                                    @error('email')
                                        <tr>
                                            <td></td>
                                            <td class="alert fill-current text-red-800">{{ $message }}</td>
                                        </tr>
                                    @enderror

                                    <tr>
                                        <td class="text-right mx-8"><label for="">Task's Status</label></td>
                                        <td>
                                            <select class="mx-6" name="stat" id="">
                                                @foreach ($statValues as $stat)
                                                <option value="{{$stat}}" {{ $task->stat == $stat ? 'selected' : '' }}>{{$stat}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    @error('stat')
                                        <tr>
                                            <td></td>
                                            <td class="alert fill-current text-red-800">{{ $message }}</td>
                                        </tr>
                                    @enderror

                                    <tr>
                                        <td class="text-right mx-8"><label for="">Remarks</label> </td>
                                        <td> <textarea class="mx-6" name="remarks" id="" cols="20" rows="3" class="@error('remarks') is-invalid @enderror"> {{ old('remarks') ?? $task->remarks }} </textarea></td>
                                    </tr>
                                    @error('email')
                                        <tr>
                                            <td></td>
                                            <td class="alert fill-current text-red-800">{{ $message }}</td>
                                        </tr>
                                    @enderror

                                </table>
                            </div>
                            <div class="flex justify-center">
                                <x-button class="my-2 bg-blue-500 hover:bg-blue-700 border-2" type='submit'> Submit </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
