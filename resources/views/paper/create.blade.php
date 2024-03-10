@include('navigation.school')
<form action="{{ url('/', [$school, $course, $branch, $semester, $subject, 'upload']) }}" method="post" enctype="multipart/form-data" >
    @csrf
    <select name="examination_type" required>
        <option value="">Please select your examination</option>
        <option value="mid-term">Mid-Term</option>
        <option value="end-term">End-Term</option>
    </select>
    <input type="number" name="year" placeholder="Please enter your year of paper">
    <input type="file" name="paper">
    <input type="submit" value="Upload">
</form>
