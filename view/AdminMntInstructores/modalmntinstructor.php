
            <!-- LARGE MODAL -->
            <div id="modal_ninstructor" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">

                    <form action="" method="post" id="instructores_form" >

                        <div class="modal-content tx-size-sm">
                            <div class="modal-header pd-x-20">
                                <h6 id="lbl_titulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-20">

                                <input type="hidden" name="instructor_id" id="instructor_id">
                                <div class="form-layout form-layout-1">
                                    <div class="row mg-b-25">

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-4"></i></span>
                                                    <input class="form-control" type="text" id="instructor_name" name="instructor_name" placeholder="Ingresa Nombre" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Apellido Paterno: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="instructor_ap" name="instructor_ap" placeholder="Primer Apellido" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Apellido Materno: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="instructor_am" name="instructor_am" placeholder="Segundo Apellido" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Genero: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2"  style="color:#868e96; width:100%"  data-placeholder="Selecciona..." name="instructor_genero" id="instructor_genero" required tabindex="-1" aria-hidden="true">
                                                        <option value="M">MUJER</option>
                                                        <option value="H">HOMBRE</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- col-2 -->

                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-control-label">Correo electrónico: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="instructor_email" name="instructor_email" placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div><!-- col-5 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Teléfono: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="instructor_telefono" name="instructor_telefono" placeholder="Teléfono" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4-->

                                    </div><!-- row -->
                                </div><!-- form-layout -->

                            </div><!-- modal-body -->
                            <div class="modal-footer">
                                <button type="submit" name="action" value="add" class="btn btn-primary tx-size-xs">Guardar</button>
                                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </form><!-- end form -->

                </div><!-- modal-dialog -->
            </div><!-- modal -->
