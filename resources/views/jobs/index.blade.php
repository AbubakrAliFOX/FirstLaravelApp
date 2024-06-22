<x-layout>
<x-slot:heading>
        Jobs
    </x-slot:heading>
    <h1>Available Jobs:</h1>
    <hr>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a class="block hover:underlie px-y py-6 border border-grey200 rounded" href="/jobs/{{$job['id']}}">
                <div class="font-bold text-blue-500">{{$job->empolyer->name}}</div>
                <strong>{{$job['title']}}</strong>
                pays {{$job['salary']}}
            </a>
        @endforeach
    </div>

    <div>
        {{$jobs->links()}}
    </div>
</x-layout>