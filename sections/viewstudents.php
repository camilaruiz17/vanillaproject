<?php include('../templates/head.php'); ?>
<?php include('../sections/students.php'); ?>
<div class="row">
    <div class="col-5">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    Students
                </div>
                <div class="card border-primary">
                <img class="card-img-top" src="https://img.freepik.com/foto-gratis/bonita-adolescente-feliz-volver-universidad_23-2148586588.jpg?w=2000" alt="Title">
                    <div class="card-body">
                    <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text"
                        class="form-control form-control-sm" name="id" id="id" aria-describedby="helpId" placeholder="ID">
                    </div>
                    <div class="mb-3">
                    <label for="name" class="form-label">Firts Name</label>
                    <input type="text"
                        class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Firts name">
                    </div>
                <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text"
                    class="form-control" name="lastname" id="lastname" aria-describedby="helpId" placeholder="Last name">
                </div>
                <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text"
                    class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="name@dominio.com">
                </div>
                <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                <input type="text"
                    class="form-control" name="image" id="image" aria-describedby="helpId" placeholder="Enter your url image">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Student courses</label>
                    <select multiple class="form-control" name="courses[]" id="listcourses">
                        <option>Select one</option>
                        <?php foreach($courses as $course){ ?>
                        <option><?php echo $course['id'];?> - <?php echo $course['coursename'];?> </option>
                        <?php } ?>
                    </select>
                </div>
                    <div class="btn-group" role="group" aria-label="Button group name">
                                        <button type="submit" name="action"value="create"class="btn btn-success">Enter</button>
                                        <button type="submit" name="action"value="update"class="btn btn-warning">Edit</button>
                                        <button type="submit" name="action"value="delete"class="btn btn-danger">Delete</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
    
    <div class="col-7">
        <table class="table">
        <thead>
            <th>ID</th>
            <th>Firts name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php foreach($students as $student): ?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['name']; ?>
                <?php echo $student['lastname']; ?>
                <?php echo $student['email']; ?>
                <?php echo $student['image']; ?>
                <td>
                    <br/>
                    <?php foreach($student["courses"] as $course){ ?>
                        -<a href="#"><?php echo $course ['coursename']; ?></a><br/>
                    <?php } ?> 
                </td>
                <td>Select</td>
                
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>

    </div>
</div>
<?php include('../templates/footer.php');?>

