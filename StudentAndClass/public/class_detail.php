<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Student Details!</title>
</head>
<body>
    <div class="container mt-5">
        
            <div class="modal-header">
                <h5 class="modal-title" id="class_listLabel">Student Details</h5>
                
            </div>
            <div class="modal-body d-flex">
                <div class="mb-3 d-flex col-4">
                    <label class="form-label font-weight-bold">Name: </label>
                    <label class="form-label"><?= $class->name ?></label>
                </div>
                <div class="mb-3 d-flex col-4">
                    <label class="form-label font-weight-bold">Subject:</label>
                    <label class="form-label"><?= $class->subject ?></label>
                   
                </div>
            </div>
            <h5>Student List</h5>
            <div class="modal-body">
                <div class="mb-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
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
                                    
                                    <?= $student->id ?>
                                </th>
                                <td><?= $student->name ?></td>
                                <td><?= $student->major ?></td>
                                <td><?= $student->age ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
       
        
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
