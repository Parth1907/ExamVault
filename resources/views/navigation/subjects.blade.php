@include('navigation.school')

<p>{{ $school }}>{{ $course }}>{{ $branch }}>Sem {{ $semester }}> </p>
@if ($subjects->count()>0)
    <ul class="list-unstyled d-flex flex-column"> <!--gap: 10px -->
        @foreach ($subjects as $subject)
            <a href="{{ url('/', [$school, $course, $branch, $semester, $subject]) }}">
                <li>{{ $subject }} </li>
            </a>
        @endforeach
    </ul>
@else
    <p>There are no subjects addded yet. Please contact the administrator</p>
@endif

