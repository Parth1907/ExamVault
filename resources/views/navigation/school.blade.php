@include('layouts.header')
<nav>
    <ul style="list-style: none ; display:flex; gap: 10px">
        @foreach ($schools as $school)
            <a href="{{ url('/', [$school->school_name]) }}">
                <li>{{ $school->school_name }} </li>
            </a>
        @endforeach
    </ul>
</nav>
