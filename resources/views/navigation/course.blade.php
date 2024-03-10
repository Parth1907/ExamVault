@include('navigation.school')
<p>{{ $school }} ></p>
@if ($courses->count()>0)
    <ul style="list-style: none ; display:flex; gap: 10px">
    @foreach ($courses as $course)
        <a href="{{ url('/', [$school, $course->course_name]) }}">
            <li>{{ $course->course_name }} </li>
        </a>
    @endforeach
</ul>
@else
    <p>There are no courses addded yet. Please contact the administrator</p>
    
@endif

