<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be
                    careful what you share.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div>
                            <x-form-input name="title" id="title" placeholder="Shift Leader" required />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>


                    <x-form-field>
                        <x-form-label for="salary">salary</x-form-label>
                        <div>
                            <x-form-input name="salary" id="salary" placeholder="$50,000" required />
                            <x-form-error name="salary" />
                        </div>

                    </x-form-field>



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
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs"
                class="text-sm font-semibold border rounded-md bg-white px-4 py-1 border-gray-400 text-gray-600 hover:bg-amber-500 leading-6 hover:text-white hover:border-gray-300">Cancel</a>
            <x-form-button>Save</x-form-button>
        </div>
    </form>



</x-layout>