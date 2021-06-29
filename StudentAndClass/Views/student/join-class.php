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
                <h5 class="modal-title" id="class_listLabel">Join Class</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($class as $classes) {
                                
                            ?>
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" class="" name="classes[]" value="<?= $classes->id ?>" >
                                    <?= $classes->id ?>
                                </th>
                                <td><?= $classes->name ?></td>
                                <td><?= $classes->subject_name ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="is_join_class" value="yes">
                <input type="hidden" name="studentID" value="<?=$studentID?>">
                <a href="./students"><button type="button" class="btn btn-secondary">Close</button></a>
                <button type="submit" class="btn btn-primary">JOIN</button>
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
