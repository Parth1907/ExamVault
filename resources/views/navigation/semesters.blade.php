@include('navigation.school')

<p>{{ $school }}>{{ $course }}>{{ $branch }}> </p>
<ul style="list-style: none ; display:grid; grid-template-columns: repeat(4,1fr)">
    @for ($sem = 1; $sem <= $semesters[0]; $sem++)
        <a href={{ route('subjects', ['school' => $school, 'course' => $course, 'branch' => $branch, 'sem' => $sem]) }}>
            <li>Semester {{ $sem }}</li>
        </a>
    @endfor
</ul>
</body>

</html>
