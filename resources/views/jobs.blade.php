<x-layout>
<x-slot:heading>
        Jobs
    </x-slot:heading>
    <h1>Available Jobs:</h1>
    <hr>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{$job['id']}}"><strong>{{$job['title']}}</strong></a>
                pays {{$job['salary']}}
            </li>
        @endforeach
    </ul>
</x-layout>