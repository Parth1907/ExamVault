@include('navigation.school')
    <p>{{$school}}>{{$course}}>{{$branch}}>Sem {{$semester}}>{{$subject}} </p>
    <a href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'create']) }}">Upload paper</a>
    <a href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'show']) }}">View paper</a>
</body>
</html>