<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Add School
        </h2>
    </x-slot>

    <form action="{{ route('admin.storeSchool') }}" method="post" class="flex justify-center flex-col">
        @csrf
        <input type="text" name="school" placeholder="Please enter the school name">
        <button type="submit" class="dark:text-white">Submit</button>
    </form>
</x-admin-layout>
