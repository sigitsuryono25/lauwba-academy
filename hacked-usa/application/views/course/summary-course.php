<div class="container-fluid mt-n5">
    <div class="card card-header-actions">
        <div class="card-header">
            You Course
            <div class="dropdown no-caret">
                <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-primary"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo site_url('add-new-course')?>">Add Course</a>
                    <a class="dropdown-item" href="javascript:void(0);">Add Materials</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class=" bg-light">
                            <th>#</th>
                            <th>Course</th>
                            <th>Training Class</th>
                            <th>Course Cover</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class=" bg-light">
                            <th>#</th>
                            <th>Course</th>
                            <th>Training Class</th>
                            <th>Course Cover</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($summary as $key => $s) { ?>
                            <tr>
                                <td class="align-middle"><?php echo $key + 1 ?></td>
                                <td class="align-middle" width="25%"><?= $s->nama_course ?></td>
                                <td class="align-middle" width="35%"><?= $s->judul ?></td>
                                <td class="align-middle text-center" width="20%"><img src="<?= base_url('assets/course/') . $s->course_cover ?>" class="img-fluid img-thumbnail w-50"/></td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                        <i class="fa fa-edit text-warning"></i>
                                    </button>
                                    <button class="btn btn-datatable btn-icon btn-transparent-dark">
                                        <i class="fa fa-trash text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>