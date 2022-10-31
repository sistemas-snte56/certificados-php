
            <!-- LARGE MODAL -->
            <div id="modal_nusuario" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">

                    <form action="" method="post" name="usuario_form" id="usuario_form" >

                        <div class="modal-content tx-size-sm">
                            <div class="modal-header pd-x-20">
                                <h6 id="lbl_titulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pd-20">

                                <input type="hidden" name="usuario_id" id="usuario_id">
                                <div class="form-layout form-layout-1">
                                    <div class="row mg-b-25">

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-4"></i></span>
                                                    <input class="form-control" type="text" id="usuario_name" name="usuario_name" placeholder="Ingresa Nombre" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Apellido Paterno: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="usuario_ap" name="usuario_ap" placeholder="Primer Apellido" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Apellido Materno: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="usuario_am" name="usuario_am" placeholder="Segundo Apellido" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <hr>




                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="usuario_curp" class="form-control-label">CURP: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-crosshairs tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="usuario_curp" name="usuario_curp" placeholder="CURP" required>
                                                </div>
                                            </div>
                                        </div><!-- col-3-->

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="usuario_rfc" class="form-control-label">RFC: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-crosshairs tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="usuario_rfc" name="usuario_rfc" placeholder="RFC" required>
                                                </div>
                                            </div>
                                        </div><!-- col-3 -->

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Genero: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2"  style="color:#868e96; width:100%"  data-placeholder="- SELECCIONA -" name="usuario_genero" id="usuario_genero" required tabindex="-1" aria-hidden="true">
                                                        <option label="- SELECCIONA -"></option>    
                                                        <option value="M">MUJER</option>
                                                        <option value="H">HOMBRE</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- col-3 -->

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Teléfono: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-iphone tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="usuario_telefono" name="usuario_telefono" placeholder="Teléfono" required>
                                                </div>
                                            </div>
                                        </div><!-- col-3 -->
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="usuario_email" class="form-control-label">Correo electrónico: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-send tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="email" id="usuario_email" name="usuario_email" placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="usuario_npersonal" class="form-control-label">Número de personal: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-pound tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="usuario_npersonal" name="usuario_npersonal" placeholder="No. personal" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="usuario_pwd" class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-key tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="password" id="usuario_pwd" name="usuario_pwd" placeholder="Contraseña" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Nivel Educativo: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-inbox tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2 "  style="color:#868e96; width:100%"  data-placeholder="--- SELECCIONA ---" name="usuario_nivel" id="usuario_nivel" required tabindex="-1" aria-hidden="true">
                                                        <option label="--- SELECCIONA ---"></option>
                                                        <option value="PREESCOLAR">PREESCOLAR</option>
                                                        <option value="PRIMARIA">PRIMARIA</option>
                                                        <option value="EDUCACIÓN ESPECIAL">EDUCACIÓN ESPECIAL</option>
                                                        <option value="SECUNDARIA">SECUNDARIA</option>
                                                        <option value="EDUCACIÓN FÍSICA">EDUCACIÓN FÍSICA</option>
                                                        <option value="NIVELES ESPECIALES">NIVELES ESPECIALES</option>
                                                        <option value="TELESECUNDARIAS">TELESECUNDARIAS</option>
                                                        <option value="PAAE">PAAE</option>
                                                        <option value="BACHILLERATO">BACHILLERATO</option>
                                                        <option value="TELEBACHILLERATO">TELEBACHILLERATO</option>
                                                        <option value="NORMALES">NORMALES</option>
                                                        <option value="UPV">UPV</option>
                                                        <option value="PENSIONADOS Y JUBILADOS">PENSIONADOS Y JUBILADOS</option>                                                    
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Region: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-inbox tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2 "  style="color:#868e96; width:100%"  data-placeholder="--- SELECCIONA ---" name="usuario_region" id="usuario_region" onchange="regiones()" required tabindex="-1" aria-hidden="true">

                                                        <option value="0" selected>-- SELECCIONA --</option> 
                                                        <option value="1">01 - REGIÓN I</option> 
                                                        <option value="2">02 - REGIÓN II</option> 
                                                        <option value="3">03 - REGIÓN III</option> 
                                                        <option value="4">04 - REGIÓN IV</option> 
                                                        <option value="5">05 - REGIÓN V</option> 
                                                        <option value="6">06 - REGIÓN VI</option> 
                                                        <option value="7">07 - REGIÓN VII</option> 
                                                        <option value="8">08 - REGIÓN VIII</option> 
                                                        <option value="9">09 - REGIÓN IX</option> 
                                                        <option value="10">10 - REGIÓN X</option> 
                                                        <option value="11">11 - REGIÓN XI</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Delegacion: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-inbox tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2"  style="color:#868e96; width:100%"  id="usuario_delegacion"     name="usuario_delegacion"> 
                                                        <option value="-">- 
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->





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
