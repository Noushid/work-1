<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Discipline List </h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-discipline">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Discipline Name</th>
                                <th>Discipline Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            if (isset($disciplines) and $disciplines != FALSE) {
                                foreach ($disciplines as $discipline) {
                                    ?>
                                    <tr>
                                        <td><?php echo $discipline->discipline_id; ?></td>
                                        <td><?php echo $discipline->short_description; ?></td>
                                        <td><?php echo $discipline->description; ?></td>
                                        <td class="center">
                                            <div  class="btn-group btn-group-xs" role="group">
                                                <a class="btn btn-info" href="<?php echo site_url(uri_string() . '/visit-type/' . $discipline->discipline_id);?>">Visit types</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
