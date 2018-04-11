<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 class="font-normal">Discipline Name &nbsp;<span class="text-primary" style="font-size: 18px;font-weight: 600px;color: #1ab394;"> <?php echo $discipline_name->description;?></span></h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <div class="col-sm-6">
                            <form action="<?php echo site_url('ajax/' . uri_string()) . '/add-visit_type';?>" method="POST" class="form-inline" id="newVisitTypeForm">
                                <div class="form-group">
                                    <!--                                                <label for="" class="control-label">Select Contractor</label>-->
                                    <select class="form-control" name="visit_type" id="visitTypeField">
                                        <option value="">Select Visit Type</option>
                                        <?php if (isset($new_visit_types) and $new_visit_types != false) {
                                            foreach ($new_visit_types as $visit_type_n) {
                                                ?>
                                                <option value="<?php echo $visit_type_n->visit_type_id;?>"><?php echo $visit_type_n->visit_description;?></option>
                                            <?php
                                            }
                                        }else {
                                            ?>
                                            <option value="">Not found</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <button class="btn btn-primary btn-sm m-t-xs">Add Visit Type</button>
                                </div>
                            </form>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-responsive dataTables-discipline-visit-type">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Visit Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            if (isset($visit_types) and $visit_types != FALSE) {
                                foreach ($visit_types as $visit_type) {
                                    ?>
                                    <tr id="visit-type-<?php echo $visit_type->visit_type_id;?>">
                                        <td><?php echo $visit_type->visit_type_id; ?></td>
                                        <td><?php echo $visit_type->visitType->visit_description; ?></td>
                                        <td class="center">
                                            <div  class="btn-group btn-group-xs" role="group">
                                                <a class="btn btn-danger" onclick="deleteVisitType(event,this,<?php echo $visit_type->visit_type_id;?>)" href="<?php echo site_url(uri_string() . '/delete/' . $visit_type->visit_type_disc_id);?>">Delete</a>
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
