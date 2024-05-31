<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id'] }}" class="hover:underline">
                <strong>{{$job['title']}}</strong>:This job pays {{$job['salary']}} per year
            </a>
        </li>
        @endforeach
    </ul>
</x-layout>