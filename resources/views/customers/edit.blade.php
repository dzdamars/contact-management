<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Customer Data') }}
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <form action="{{route('customers.update',['customer' => $customer->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <div>
                                <table>
                                    <tr>
                                        <td class="text-right"><label for="">Customer's Name</label></td>
                                        <td class="w-2/3"><input class="mx-6" type="text" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') ?? $customer->name }}"></td>
                                    </tr>
                                    @error('name')
                                        <tr>
                                            <td></td>
                                            <td class="alert fill-current text-red-800">{{ $message }}</td>
                                        </tr>
                                    @enderror
                                    <tr>
                                        <td class="text-right mx-8"><label for="">Customer's Email</label> </td>
                                        <td><input class="mx-6" type="text" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') ?? $customer->email }}"></td>
                                    </tr>
                                    @error('email')
                                        <tr>
                                            <td></td>
                                            <td class="alert fill-current text-red-800">{{ $message }}</td>
                                        </tr>
                                    @enderror

                                    <tr>
                                        <td class="text-right mx-8"><label for="">Customer's Phone Number</label></td>
                                        <td><input class="mx-6" type="text" name="phone" class="@error('phone') is-invalid @enderror" value="{{ old('phone') ?? $customer->phone }}"></td>
                                    </tr>
                                    @error('phone')
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
