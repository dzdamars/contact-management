<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Follow Up Task Assignment') }}
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <form action="{{route('tasks.store')}}" method="post">
                            @csrf
                            <div>
                                <table>
                                    <tr>
                                        <td class="text-right"><label for="">Contact Name</label></td>
                                        <td class="w-2/3">
                                        <input class="mx-6" type="text" name="name" class="@error('name') is-invalid @enderror" value="{{ $customer->name }}" disabled>
                                        <input class="mx-6" type="text" name="customer" class="@error('customer') is-invalid @enderror" value="{{ $customer->id }}" hidden type="hidden">
                                        </td>
                                    </tr>
                                    @error('name')
                                        <tr>
                                            <td></td>
                                            <td class="alert fill-current text-red-800">{{ $message }}</td>
                                        </tr>
                                    @enderror
                                    <tr>
                                        <td class="text-right">
                                            <label for=""> Assign to Agent</label>
                                        </td>
                                        <td>
                                            <select class="mx-6" name="agent" id="" required>
                                                <option value="" hidden>Agent List</option>
                                                @foreach ($users as $user)
                                                <option value="{{$user->id}}" {{ old('agent') == $user->id ? 'selected':''}} >{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right mx-8"><label for="">Initial Remarks</label> </td>
                                        <td><textarea class="mx-6" name="remarks" id="" cols="20" rows="3" class="@error('remarks') is-invalid @enderror">{{ old('remarks') }}</textarea></td>
                                    </tr>
                                    @error('remarks')
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
