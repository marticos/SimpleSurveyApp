<x-app-layout xmlns="http://www.w3.org/1999/html">
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All surveys') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>

                                <div>
                                    @foreach ($surveys as $survey)
                                        <div class="survey-card">
                                            <h2>{{ $survey->title }}</h2>
                                            <p>{{ $survey->description }}</p>
                                            <p>Created at: {{ $survey->created_at }}</p>
                                        </div>
                                    @endforeach
                                </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .survey-card {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .survey-card h2 {
            margin: 0;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .survey-card p {
            margin: 0;
            margin-bottom: 10px;
        }
    </style>
</x-app-layout>
