@include('navigation.school')

<p>{{ $school }}>{{ $course }} </p>
@if ($branches->count()>0)
    <ul style="list-style: none ; display:flex; gap: 10px">
    @foreach ($branches as $branch)
        <a href="{{ url('/', [$school, $course, $branch]) }}">
            <li>{{ $branch }} </li>
        </a>
    @endforeach
</ul>
@else
    <p>There are no branches addded yet. Please contact the administrator</p>
    
@endif

</body>

</html>
