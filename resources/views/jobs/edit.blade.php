<x-layout>
    <x-slot:heading>
        Edit Job - {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" value="{{ $job->title }}" id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader">
                            </div>
                            @error('title')
                                <p class="text-red-500 italic text-xs font-semibold mt-1">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="salary" id="salary" value="{{ $job->salary }}"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="$50,000">
                            </div>
                            @error('salary')
                                <p class="text-red-500 italic text-xs font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- <div class="mt-6">

                    @if ($errors->any())

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 italic text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>

                    @endif
                </div> -->
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between gap-x-6">
            @can('destroy', $job)
                <div class="flex items-center">
                    <button form="delete-form"
                        class="text-sm font-semibold border rounded-md bg-white px-4 py-2 border-red-400 hover:bg-red-500 leading-6 text-red-500 hover:text-white hover:border-gray-300">Delete</button>
                </div>
            @endcan
            <div class=" flex items-center gap-x-6">

                <a href="/jobs"
                    class="text-sm font-semibold border rounded-md bg-white px-4 py-1 border-gray-400 text-gray-600 hover:bg-amber-500 leading-6 hover:text-white hover:border-gray-300">Cancel</a>
                <div>
                    <x-form-button>Save</x-form-button>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="/jobs/{{$job->id}}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</x-layout>