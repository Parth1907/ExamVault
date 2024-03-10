@include('navigation.school')
<table>
    <tr>
        <th>Year</th>
        <th>View</th>
        <th>Download</th>
    </tr>
    @foreach ($years as $year)
        <tr>
            <td>{{ $year }}</td>
            <td><a href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'show', $exams, $year, 'view']) }}">view</a></td>
            <td><a href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'show', $exams, $year,'download']) }}">download</a></td>
        </tr>
    @endforeach
</table>
