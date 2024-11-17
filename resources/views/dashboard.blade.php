<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Dashboard') }}
        </x-header>
    </x-slot>

    <x-container>
        <x-form post :action="route('question.store')">
            <x-textarea label="Qual é a sua pergunta?" name="question" />

            <x-button.primary>Save</x-button.primary>
            <x-button.reset>Cancel</x-button.reset>
        </x-form>

        <hr class="my-8 border-t border-gray-200 dark:border-gray-700">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Question
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Interactions
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $item)
                <x-question :question="$item" />
                @endforeach

                </tbody>
            </table>
        </div>

    </x-container>
</x-app-layout>
