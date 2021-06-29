<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Shopping') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (isset($message))
                    <p>{{$message}}</p>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('articles.create')}}" class="bg-gray-500 p-2 text-white hover:shadow-lg text-xs font-thin" style="width: right;">Create</a>
                    <div class="table w-full p-2">
                        <table class="w-full border">
                            <thead>
                                <tr class="bg-gray-50 border-b">
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Name
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Brand
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Statu
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                        <td class="p-2 border-r">{{$article->name}}</td>
                                        <td class="p-2 border-r">{{$article->brand->title}}</td>
                                        @if ($article->status == true)
                                            <td class="p-2 border-r"><span class="text-green-600">buy</span></td>
                                        @else
                                            @if ($article->brand->title == 'Reunir')
                                                <td class="p-2 border-r"><span class="text-red-600">--</span></td>
                                            @else
                                                <td class="p-2 border-r"><span class="text-red-600">to buy</span></td>
                                            @endif
                                        @endif
                                        <td>
                                            <form action="{{route('articles.destroy', $article->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @if ($article->status != true)
                                                    <a href="{{route('articles.show', $article->id)}}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                                    <a href="{{route('articles.edit', $article->id)}}" class="bg-green-500 p-2 text-white hover:shadow-lg text-xs font-thin">Check</a>
                                                @endif
                                                <button type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    body{background:white !important;}
</style>