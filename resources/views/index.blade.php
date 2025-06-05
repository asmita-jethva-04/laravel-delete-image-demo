<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Student Form</h2>
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <legend>Student Information:</legend>
            daylistid:<br>
            <input type="text" name="daylistid" required><br>
            Image:<br>
            <input type="file" name="image" required><br><br>
            Date:<br>
            <input type="date" name="date" required><br><br>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <h2>Student Details</h2>
    <form action="{{ route('students.destroyMultiple') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>ID</th>
                    <th>daylistid</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="{{ $student->id }}"></td>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->daylistid }}</td>
                        <td><img src="{{ asset('images/' . $student->image) }}" width="100"></td>
                        <td>{{ $student->date }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('students.destroy', $student->id) }}">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">No records found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <input type="submit" name="deleteSelected" value="Delete Selected" class="btn btn-danger">
    </form>

    {{ $students->links() }}
</div>

<script>
document.getElementById('checkAll').onclick = function () {
    const checkboxes = document.querySelectorAll('input[name="ids[]"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
};
</script>
</body>
</html>
