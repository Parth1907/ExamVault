<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <p>{{ session('message') }}</p>
    </div>
@endif
@include('navigation.school')

@if ($exams->count()>0)
    @foreach ($exams as $exam)
    <a href="{{ url('/', [$school, $course, $branch, $semester, $subject, 'show', $exam]) }}">{{$exam}}</a>
@endforeach
@else
<p>There have no papers been uploaded for this subject yet.</p>
@endif
    

