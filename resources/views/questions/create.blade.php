<x-app-layout xmlns="http://www.w3.org/1999/html">
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Add Question to Survey: {{ $survey->title }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Create your question') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("Select question title, type and add the options.") }}
                                </p>
                            </header>

                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>

                            <form method="post" action="{{ route('questions.store', $survey) }}" class="mt-6 space-y-6">
                                @csrf
                                @method('post')

                                <div>
                                    <x-input-label for="question_text" :value="__('Question')" />
                                    <x-text-input id="question_text" name="question_text" type="text" class="mt-1 block w-full" required/>
                                    <x-input-error class="mt-2" :messages="$errors->get('question_text')" />
                                </div>

                                <div>
                                    <x-input-label for="type" :value="__('Type')" />
                                    <select id="type" name="type" required onchange="showOptions(this)" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                        <option value="">Select type</option>
                                        <option value="text">Text</option>
                                        <option value="multiple_choice">Multiple choice</option>
                                    </select>
                                </div>

                                <div id="options" style="display: none;">
                                    <x-input-label for="options" :value="__('Options')" />
                                    <div id="options-container">
                                        <!-- Dynamic options will be added here -->
                                    </div>
                                    <button type="button" onclick="addOption()" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Add Option</button>
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save question') }}</x-primary-button>
                                    <span>{{ __('or') }}</span>
                                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Close</a>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showOptions(select) {
            if (select.value === 'multiple_choice') {
                document.getElementById('options').style.display = 'block';
            } else {
                document.getElementById('options').style.display = 'none';
            }
        }

        function addOption() {
            var optionsContainer = document.getElementById('options-container');
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'options[]';
            input.placeholder = 'Option';
            optionsContainer.appendChild(input);
        }
    </script>
</x-app-layout>
