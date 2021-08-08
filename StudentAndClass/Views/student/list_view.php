
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>List student!</title>
</head>

<body>
    <div class="container mt-3">
        <!-- Button trigger modal -->
        <div class="row">
        <!-- search student form -->
            <div class="col-6 ">
                <form action="./student" class="float-end position-relative form-control" method="POST">
                    
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?=$key_student?>" placeholder="Enter your search keywords" name="search_key_student">
                            <input type="hidden" value="<?=$key_class?>" name="search_key_class">
                        </div>
                        <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> -->
                        <button type="submit" class="btn btn-warning col-sm-2 ">Search</button>
                    </div>
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#student">
                        Add Student
                    </button>
                </form>
            </div>
        <!-- search class form -->
            <div class="col-6">
               
                <form action="./student" class="float-end position-relative form-control" method="POST">
                    
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?=$key_class?>" placeholder="Enter your search keywords" name="search_key_class">
                            <input type="hidden" value="<?=$key_student?>" name="search_key_student">
                        </div>
                        <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> -->
                        <button type="submit" class="btn btn-warning col-sm-2 ">Search</button>
                    </div>
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#class">
                        Add Class
                    </button>
                </form>
            </div>
        </div>
        <!-- form to add a student -->
        <div class="modal fade" id="student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="studentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="./students">
                        <div class="modal-header">
                            <h5 class="modal-title" id="studentLabel">Add Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name_student">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Major</label>
                                <!-- <input type="text" class="form-control" name="major"> -->
                                <select name="major_id" class="form-control" >
                                    <?php foreach($list_major as $major) {?>
                                        <option value="<?=$major->id?>"><?=$major->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">age</label>
                                <input type="text" class="form-control" name="age">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="is_add_new_student" value="yes">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- form to add a class -->
        <div class="modal fade" id="class" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="classLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="./students">
                        <div class="modal-header">
                            <h5 class="modal-title" id="classLabel">Add Class</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name_class">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <select name="subject_id" class="form-control" >
                                    <?php foreach($list_subject as $subject) {?>
                                        <option value="<?=$subject->id?>"><?=$subject->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="is_add_new_class" value="yes">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit_class" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- form to add a major -->
        <div class="modal fade" id="major" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="major" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="./students">
                        <div class="modal-header">
                            <h5 class="modal-title" id="major">Add Major</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name_major" value="">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="is_add_major" value="yes">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit_class" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- form to add a subject -->
        <div class="modal fade" id="subject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="subject" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="./students">
                        <div class="modal-header">
                            <h5 class="modal-title" id="subject">Add Major</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name_subject" value="">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="is_add_subject" value="yes">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit_class" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- button add student to class -->
        

    </div>
    
    

    

    <div class="container mt-3">
        <div class="row">
            <!-- list student -->
            <div class="col-6">
                <h4 class="text-danger">
                    <?php 
                        if(isset($detele_student_result)){
                            echo $detele_student_result;
                            $detele_student_result='';
                        }
                    ?>
                </h4>
                <h2>List student</h2>
                <table class="table table-hover pd-fm">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Major</th>
                            <th scope="col">Age</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_student as $student) {
                        ?>
                        <tr>
                            <th scope="row"><?= $student->id ?></th>
                            <td><?= $student->name ?></td>
                            <td><?= $student->major_name ?></td>
                            <td><?= $student->age ?></td>
                            <td class="d-flex">    
                                <form method="POST" action="./JoinClass">
                                    <input type="hidden" name="studentID" value="<?= $student->id ?>">
                                    <input type="hidden" name="is_join_class" value="yes">
                                    <button type="submit" class="btn btn-primary">Join class</button>
                                </form>
                                <form method="POST" action="./DetailStudent">
                                    <input type="hidden" name="studentID" value="<?= $student->id ?>">
                                    <input type="hidden" name="is_view_detail_student" value="yes">
                                    <button type="submit" class="btn btn-info">Detail</button>
                                </form>
                                <form method="POST" action="./student" onclick="return confirm('Are you sure?');">
                                    <input type="hidden" name="studentID" value="<?= $student->id ?>">
                                    <input type="hidden" name="is_delete_student" value="yes">
                                    <button type="submit" class="btn btn-danger">DEL</button>
                                </form>
                                <form method="POST" action="./updateStudents">
                                    <input type="hidden" name="studentID" value="<?= $student->id ?>">
                                    <input type="hidden" name="is_update_student" value="yes">
                                    <button type="submit" class="btn btn-success">FIX</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            
            <!-- list class -->
            <div class="col-6">
                <h4 class="text-danger">
                    <?php 
                        if(isset($delete_class_result)){
                            echo $delete_class_result;
                            $delete_class_result='';
                        }
                    ?>
                </h4>
                <h2>List Class</h2>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_class as $class) {
                        ?>
                        <tr>
                            <th scope="row"><?= $class->id ?></th>
                            <td><?= $class->name ?></td>
                            <td><?= $class->subject_name ?></td>
                            <td class="d-flex">
                                <form method="POST" action="./addStudentToClass">
                                    <input type="hidden" name="classID" value="<?= $class->id ?>">
                                    <input type="hidden" name="is_add_student" value="yes">
                                    <button type="submit" class="btn btn-primary">Add Student</button>
                                </form>
                                <form method="POST" action="./DetailClass">
                                    <input type="hidden" name="classID" value="<?= $class->id ?>">
                                    <input type="hidden" name="is_view_class_detail" value="yes">
                                    <button type="submit" class="btn btn-info">Detail</button>
                                </form>
                                <form method="POST" action="./student" onclick="return confirm('Are you sure?');">
                                    <input type="hidden" name="classID" value="<?= $class->id ?>">
                                    <input type="hidden" name="is_delete_class" value="yes">
                                    <button type="submit" class="btn btn-danger">DEL</button>
                                </form>
                                <form method="POST" action="./updateClasses"> 
                                    <input type="hidden" name="classID" value="<?= $class->id ?>">
                                    <input type="hidden" name="is_update_class" value="yes">
                                    <button type="submit" class="btn btn-success">FIX</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <!-- list major -->
            <div class="col-6">
                
                <h2>List Major</h2>
                <h4 class="text-danger">
                    <?php 
                        if(isset($delete_major_result)){
                            echo $delete_major_result;
                            $delete_major_result='';
                        }
                    ?>
                </h4>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#major">
                    Add Major
                </button>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_major as $major) {
                        ?>
                        <tr>
                            <th scope="row"><?= $major->id ?></th>
                            <td><?= $major->name ?></td>
                            <td class="d-flex">
                                
                                <form method="POST" action="./student" onclick="return confirm('Are you sure?');">
                                    <input type="hidden" name="majorID" value="<?= $major->id ?>">
                                    <input type="hidden" name="is_delete_major" value="yes">
                                    <button type="submit" class="btn btn-danger">DEL</button>
                                </form>
                                <form method="POST" action="./updateClasses"> 
                                    <input type="hidden" name="classID" value="<?= $major->id ?>">
                                    <input type="hidden" name="is_update_major" value="yes">
                                    <button type="submit" class="btn btn-success">FIX</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <!-- list subject -->
            <div class="col-6">
                
                <h2>List Subject</h2>
                <h4 class="text-danger">
                    <?php 
                        if(isset($delete_subject_result)){
                            echo $delete_subject_result;
                            $delete_subject_result='';
                        }
                    ?>
                </h4>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#subject">
                    Add Subject
                </button>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_subject as $subject) {
                        ?>
                        <tr>
                            <th scope="row"><?= $subject->id ?></th>
                            <td><?= $subject->name ?></td>
                            <td class="d-flex">
                                <form method="POST" action="./student" onclick="return confirm('Are you sure?');">
                                    <input type="hidden" name="subjectID" value="<?= $subject->id ?>">
                                    <input type="hidden" name="is_delete_subject" value="yes">
                                    <button type="submit" class="btn btn-danger">DEL</button>
                                </form>
                                <form method="POST" action="./updateClasses"> 
                                    <input type="hidden" name="classID" value="<?= $major->id ?>">
                                    <input type="hidden" name="is_update_class" value="yes">
                                    <button type="submit" class="btn btn-success">FIX</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
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