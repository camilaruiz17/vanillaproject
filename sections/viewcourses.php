<?php include('../templates/head.php'); ?>
<?php include('../sections/courses.php'); ?>

contenido de la seccion index.php (inicio de la app)
<div class="container">
    <div class="row">
        <div class="col-5">
                <div class="row">
                    <div class="cold-5">
                        <form action="" method="post">
                            <div class="card">
                                <div class="card-header">
                                    Course
                                </div>
                                <div class="car-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">ID</label>
                                        <input type="text"
                                            class="form-control" 
                                            name="id" 
                                            id="id"
                                            value="<?php echo $id; ?>"
                                            aria-describedby="helpId" placeholder="ID">
                                    </div>
                                    <div class="mb-3">
                                        <label for="coursename" class="form-label">Course Name</label>
                                        <input type="text"
                                            class="form-control"
                                            name="coursename" 
                                            id="coursename"
                                            value="<?php echo $coursename; ?>"
                                            aria-describedby="helpId" placeholder="">
                                    </div> 
                                    <br/>          
                                    <div class="btn-group" role="group" aria-label="Button group name">
                                        <button type="submit" name="action"value="create"class="btn btn-success">Enter</button>
                                        <button type="submit" name="action"value="update"class="btn btn-warning">Edit</button>
                                        <button type="submit" name="action"value="delete"class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <br/>
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-7">
            <div class="table">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listcourses as $course){ ?>
                        <tr class="">
                            <td> <?php echo $course['id']; ?> </td>
                            <td> <?php echo $course['coursename']; ?> </td>
                            <td>  <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $course['id']; ?>"/>
                                <input type="submit" value="Select" name="action" class="btn btn-info">
                                </form> 
                            </td>
                        </tr>
                        
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
<?php include('../templates/footer.php');?>