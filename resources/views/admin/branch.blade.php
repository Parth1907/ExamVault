<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Branch
        </h2>
    </x-slot>

    <form action="{{route('admin.storeBranch')}}" method="post" class="flex justify-center flex-col">
        @csrf
        <select name="school">
            <option value="">Please select your school</option>
            @foreach ($schools as $school)
                <option value="{{$school->school_name}} ">{{$school->school_name}} </option>
            @endforeach
        </select>
        <select name="course">
            <option value="">Please select your course</option>
            @foreach ($courses as $course)
                <option value="{{$course->course_name}} ">{{$course->course_name}} </option>
            @endforeach
        </select>
        <input type="text" name="branch" placeholder="Please enter the branch name">
        <button class="dark:text-white " type="submit">Submit</button>
    </form>
</x-admin-layout>