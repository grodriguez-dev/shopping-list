<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Shopping') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <form action="{{route('articles.update', $article->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-5 relative">
                            <select type="text" id="brand" class="peer pt-8 border border-gray-200 focus:outline-none rounded-md focus:border-gray-500 focus:shadow-sm w-full p-3 h-16 placeholder-transparent" name="brand_id" required="" >
                              <option value="">Select one brand...</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id ?? '' }}"
                                    @if($brand->id == $article->brand_id)
                                      selected=""
                                    @endif
                                    >{{ $brand->title }}</option>      
                                @endforeach
                            </select>
                            <label for="brand" class="peer-placeholder-shown:opacity-100   opacity-75 peer-focus:opacity-75 peer-placeholder-shown:scale-100 scale-75 peer-focus:scale-75 peer-placeholder-shown:translate-y-0 -translate-y-3 peer-focus:-translate-y-3 peer-placeholder-shown:translate-x-0 translate-x-1 peer-focus:translate-x-1 absolute top-0 left-0 px-3 py-5 h-full pointer-events-none transform origin-left transition-all duration-100 ease-in-out">Brand</label>
                            
                        </div>
                        <button type="submit" class="bg-indigo-600 text-white p-3 rounded-md">Edit</button>
                        <a href="{{route('articles.index')}}" class="bg-red-600 text-white p-3 rounded-md">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        body{background:white !important;}
    </style>
</x-app-layout>