<div class="container-fluid mt-n5">
    <div class="card card-header-actions">
        <div class="card-header">
            <?php echo $cardtitle ?>
            <div class="dropdown no-caret">
                <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-primary"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo site_url('add-new-course') ?>">Tambah Kursus</a>
                    <a class="dropdown-item" href="<?php echo site_url('add-new-material') ?>">Tambah Materi</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class=" bg-light">
                            <th>#</th>
                            <th>Kursus</th>
                            <th>Kelas Training</th>
                            <th>Cover Kursus</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class=" bg-light">
                            <th>#</th>
                            <th>Kursus</th>
                            <th>Kelas Training</th>
                            <th>Cover Kursus</th>
                            <th>Tindakan</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($summary as $key => $s) { ?>
                            <tr>
                                <td class="align-middle"><?php echo $key + 1 ?></td>
                                <td class="align-middle" width="25%"><?= $s->nama_course ?></td>
                                <td class="align-middle" width="35%"><?= $s->judul ?></td>
                                <td class="align-middle text-center" width="20%"><img src="<?= base_url('assets/course/') . $s->location_folder . '/' . $s->course_cover ?>" class="img-fluid img-thumbnail w-50"/></td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-datatable btn-icon mr-2" href="javascript:void(0)" onclick="return shownDetailCourse('<?php echo $s->id_course ?>')">
                                        <i class="fa fa-eye text-success"></i>
                                    </a>
                                    <a class="btn btn-datatable btn-icon mr-2" href="<?php echo site_url('edit-course/' . $s->id_course . '?mode=edit') ?>">
                                        <i class="fa fa-edit text-warning"></i>
                                    </a>
                                    <a href="<?php echo site_url('course/delete_course/' . $s->id_course) ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-datatable btn-icon ">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>