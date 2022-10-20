
            <!-- LARGE MODAL -->
            <div id="modal_ncategorias" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">

                    <form action="" method="post" id="categorias_form" >

                        <div class="modal-content tx-size-sm">
                            <div class="modal-header pd-x-20">
                                <h6 id="lbl_titulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-20">
                                <input type="hidden" name="categoria_id" id="categoria_id">
                                <div class="form-layout form-layout-1">
                                    <div class="row mg-b-25">

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Ingresa nombre de categoría: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" name="categoria_nombre"  id="categoria_nombre" placeholder="Categoría" required>
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
