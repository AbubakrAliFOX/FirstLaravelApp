<x-layout>
<x-slot:heading>
        Job Details
    </x-slot:heading>
    <h1><strong>{{$job->title}}</strong></h1>
    <h3>{{$job->title}}s get paid around {{$job->salary}} per year!</h3>
    @can('edit', $job)
        <x-button href="/jobs/{{$job->id}}/edit" class="mt-2">Edit</x-button>
    @endcan
</x-layout>