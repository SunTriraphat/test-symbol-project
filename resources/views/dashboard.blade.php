<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Invoices</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    symbol
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    value
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    A
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    1
                                </td>

                            </tr>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    B
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    5
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    Z
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    10
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    L
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    50
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    C
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    100
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    D
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    500
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    R
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    1000
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 col-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex justify-center ">

                    <section>
                        <h1 class="text-4xl text-green-500">
                            Input
                        </h1>
                        @if (session('success_message'))
                            {!! session('success_message') !!}
                        @endif
                        <form method="POST" action="{{ route('calculate.cal') }}">
                            @csrf
                            <input class="border border-grey-300 rounded-lg dark:bg-gray-600" type="text"
                                name="input_val" />
                            @error('input_val')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                            <button class="m-2 px-6 py-2 bg-green-500 hover:bg-green-700 rounded-lg"
                                type="submit">submit</button>
                        </form>
                    </section>


                </div>
            </div>

        </div>
    </div>
</x-app-layout>
