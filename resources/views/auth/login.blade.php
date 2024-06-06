<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div>
                            <x-form-input name="email" id="email" :value="old('email')" type="email" required />
                            <x-form-error name="email" />
                        </div>

                    </x-form-field>


                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div>
                            <x-form-input name="password" id="password" type="password" required />
                            <x-form-error name="password" />

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
            <x-form-button>login</x-form-button>
        </div>
    </form>



</x-layout>