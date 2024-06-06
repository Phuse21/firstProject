<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)

        <a href="/jobs/{{ $job['id'] }}"
            class="block px-4 py-6 border-b border-gray-300 rounded-lg hover:shadow-lg  hover:-translate-y-1 hover:scale-100 bg-white duration-300">
            <div class="font-bold text-blue-500 text-sm">{{$job->employer->name}}</div>
            <div>
                <strong>{{$job['title']}}</strong>:This job pays {{$job['salary']}} per year
            </div>
        </a>

        @endforeach
    </div>
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>