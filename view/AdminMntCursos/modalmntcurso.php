
            <!-- LARGE MODAL -->
            <div id="modal_ncurso" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">

                    <form action="" method="post" id="cursos_form" >

                        <div class="modal-content tx-size-sm">
                            <div class="modal-header pd-x-20">
                                <h6 id="lbl_titulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-20">

                                <input type="hidden" name="curso_id" id="curso_id">
                                <div class="form-layout form-layout-1">
                                    <div class="row mg-b-25">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Categoría: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-bars tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2"  style="width:100%"  data-placeholder="Selecciona..." name="curso_categoria_id" id="curso_categoria_id" required tabindex="-1" aria-hidden="true">

                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- col-6 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Nombre del curso: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="curso_name" name="curso_name" placeholder="Ingresa nombre" required>
                                                </div>
                                            </div>
                                        </div><!-- col-6 -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Descripción: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-comment-o tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" name="curso_descripcion"  id="curso_descripcion" placeholder="Alguna descripción del curso" required>
                                                </div>
                                            </div>
                                        </div><!-- col-12 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Fecha Inicial: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="date" name="curso_fecha_inicial"  id="curso_fecha_inicial" placeholder="Ingrese la fecha de inicio" required>                                            
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Fecha Final: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="date" name="curso_fecha_final"  id="curso_fecha_final" placeholder="Ingrese la fecha de final" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Estatus: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-bars tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" name="curso_status"  id="curso_status" placeholder="Estatus inicial del curso" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Nombre del instructor: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2 "  style="color:#868e96; width:100%"  data-placeholder="Selecciona..." name="curso_instructor_id" id="curso_instructor_id" required tabindex="-1" aria-hidden="true">
                                                    
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- col-12 -->

                                    </div><!-- row -->
                                </div><!-- form-layout -->

                            </div><!-- modal-body -->
                            <div class="modal-footer">
                                <button type="submit" name="action" value="add" class="btn btn-primary tx-size-xs">Guardar</button>
                                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Cerrar</button>
                                <!-- <button type="button" class="btn btn-primary tx-size-xs">Guardar</button>
                                <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Cerrar</button> -->
                            </div>
                        </div>

                    </form><!-- end form -->

                </div><!-- modal-dialog -->
            </div><!-- modal -->
