<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if (session()->has('message'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded mt-3 mb-1">
            {{ session('message') }}
        </div>
    @endif
    <div class="mt-4">
        <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data" class="items-center">
            @csrf
            <div class="flex w-full items-center justify-start bg-grey-lighter">
                <label
                    class="flex items-center px-2 py-1 bg-white text-euro-one font-semibold rounded-lg shadow-lg tracking-wide uppercase border cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 m-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                    </svg>
                    <input id="csv" type="file" name="csv" placeholder="Arquivo"
                        class="block w-full text-sm text-slate-500 cursor-pointer
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-white file:text-euro-one @error('csv') is-invalid @enderror" required>

                    @error('csv')
                        <span class="w-full px-2 py-4 border border-red-500 bg-red-400 text-white rounded mt-3 mb-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <button type="submit"
                    class="ml-5 px-5 py-2 md:px-3 md:py-2 rounded-md bg-blue-700 text-white font-semibold">
                    Cadastrar Venda
                </button>
            </div>
        </form>
    </div>

    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs text-euro-one font-semibold uppercase tracking-wider">
                            Razão social
                        </th>

                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Cnpj
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Número
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                           Valor
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Produto
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Valor unitário
                        </th>
                        
                         <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Quantidade
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $record->razao_social }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $record->cnpj }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap"> {{$record->numero}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$record->valor}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$record->produto}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$record->valor}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$record->quantidade}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  <div class=" pt-2 pb-3">
         {{ $records->links() }}
    </div>
</div>
