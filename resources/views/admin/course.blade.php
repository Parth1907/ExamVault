<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Course
        </h2>
    </x-slot>

    <form action="{{route('admin.storeCourse')}}" method="post" class="flex justify-center flex-col">
        @csrf
        <select name="school">
            <option value="">Please select your school</option>
            @foreach ($schools as $school)
                <option value="{{$school->school_name}} ">{{$school->school_name}} </option>
            @endforeach
        </select>
        <input type="text" name="course" placeholder="Please enter the course name">
        <input type="number" name="semesters" placeholder="Please enter the no. of semesters">
        <button class="dark:text-white " type="submit">Submit</button>
    </form>
</x-admin-layout>