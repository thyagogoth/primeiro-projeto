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
    </x-container>
</x-app-layout>
