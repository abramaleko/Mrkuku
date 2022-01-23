<x-slot name="title">
    {{ __('Project Calculator') }}
</x-slot>

<div class="container px-6 py-8 mx-auto">
    <h1 class="text-xl font-bold text-gray-700 lg:text-3xl lg:py-0">
        Project Calculator
    </h1>
    <p class="py-2 text-base leading-relaxed text-gray-600 ">
        Welcome to Mr Kuku Project Calculator, here you can calculate the capital required and profit returns of your
        investments depending on which project you have selected.
    </p>

    <div class="mt-4">
        <label class="block lg:flex">
            <span class="text-lg font-bold text-gray-700">Project Name :</span>
            <select wire:model="projectChoice" class="block px-4 py-1 mt-2 text-base rounded-md lg:ml-4 lg:mt-0 w-72">
                <option>Choose ...</option>
                @foreach ($projects as $project)
                <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>
        </label>
    </div>

    @if ($calculateRearing)
        @livewire('app.investor.rearing-calculator')
    @endif

    @if ($calculateCorn)
    @livewire('app.investor.corn-calculator')
    @endif

</div>
