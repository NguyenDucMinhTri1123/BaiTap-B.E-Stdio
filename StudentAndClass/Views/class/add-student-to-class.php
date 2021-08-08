<div class="modal fade" id="student_list" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="student_listLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="./students">
                        <div class="modal-header">
                            <h5 class="modal-title" id="student_listLabel">Add Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Major</th>
                                    <th scope="col">Age</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_student as $student) {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <input type="checkbox" name="<?= $student->id ?>" value="1">
                                    </th>
                                    <td><?= $student->name ?></td>
                                    <td><?= $student->major_name ?></td>
                                    <td><?= $student->age ?></td>
                                    
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <input type="hidden" name="is_add_student_to_class" value="yes">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <title>Join Class!</title>
</head>



<body>
    <div class="container mt-5">
        <form method="POST" action="./students">
            <div class="modal-header">
                <h5 class="modal-title" id="student_listLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Major</th>
                        <th scope="col">Age</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student) {
                    ?>
                    <tr>
                        <th scope="row">
                            <input type="checkbox" name="student[]" value="<?= $student->id ?>">
                        </th>
                        <td><?= $student->name ?></td>
                        <td><?= $student->major_name ?></td>
                        <td><?= $student->age ?></td>
                        
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <div class="modal-footer">
                <input type="hidden" name="is_add_student_to_class" value="yes">
                <input type="hidden" name="classID" value="<?=$classID?>">
                <a href="./students"><button type="button" class="btn btn-secondary">Close</button></a>
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>
        </form>
    </div>
    
    

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>
