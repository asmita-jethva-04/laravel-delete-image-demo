<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Student Form</h2>
    <form action="<?php echo e(route('students.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
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
    <form action="<?php echo e(route('students.destroyMultiple')); ?>" method="POST">
        <?php echo csrf_field(); ?>
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
                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="<?php echo e($student->id); ?>"></td>
                        <td><?php echo e($student->id); ?></td>
                        <td><?php echo e($student->daylistid); ?></td>
                        <td><img src="<?php echo e(asset('storage/images/' . $student->image)); ?>" width="100"></td>
                        <td><?php echo e($student->date); ?></td>
                        <td>
                            <a class="btn btn-danger" href="<?php echo e(route('students.destroy', $student->id)); ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <input type="submit" name="deleteSelected" value="Delete Selected" class="btn btn-danger">
    </form>

    <?php echo e($students->links()); ?>

</div>

<script>
document.getElementById('checkAll').onclick = function () {
    const checkboxes = document.querySelectorAll('input[name="ids[]"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
};
</script>
</body>
</html>
<?php /**PATH D:\XAMPP_8\htdocs\delete demo\delete\resources\views/index.blade.php ENDPATH**/ ?>