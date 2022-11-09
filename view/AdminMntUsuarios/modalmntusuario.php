
            <!-- LARGE MODAL -->
            <div id="modal_nusuario" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">

                    <form action="" method="post" id="usuarios_form" >

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

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Genero: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2"  style="color:#868e96; width:100%"  data-placeholder="Selecciona..." name="usuario_genero" id="usuario_genero" required tabindex="-1" aria-hidden="true">
                                                        <option value="none" selected disabled hidden>SELECCIONA</option>    
                                                        <option value="MUJER">MUJER</option>
                                                        <option value="HOMBRE">HOMBRE</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- col-2 -->

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Rol: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2"  style="color:#868e96; width:100%"  data-placeholder="Selecciona..." name="usuario_type" id="usuario_type" required tabindex="-1" aria-hidden="true">
                                                        <option value="none" selected disabled hidden>SELECCIONA</option>    
                                                        <option value="1">USUARIO</option>
                                                        <option value="2">ADMINISTRADOR</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->

                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-control-label">Teléfono: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="usuario_telefono" name="usuario_telefono" placeholder="Teléfono" required>
                                                </div>
                                            </div>
                                        </div><!-- col-5-->


                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Correo electrónico: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="usuario_email" name="usuario_email" placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4 -->



                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Número de personal: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="text" id="usuario_npersonal" name="usuario_npersonal" placeholder="Número de personal" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4-->


                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-pencil tx-16 lh-0 op-6"></i></span>
                                                    <input class="form-control" type="password" id="usuario_pwd" name="usuario_pwd" placeholder="Contraseña" required>
                                                </div>
                                            </div>
                                        </div><!-- col-4-->




                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label">NIVEL EDUCATIVO: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2 "  style="color:#868e96; width:100%"  data-placeholder="-- SELECCIONA --" name="usuario_nivel" id="usuario_nivel" required tabindex="-1" aria-hidden="true">
                                                        <option value="none" selected disabled hidden>SELECCIONA...</option>
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

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">REGIÓN: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2 "  style="color:#868e96; width:100%" onchange="selectRegion(this.value)" data-placeholder="-- SELECCIONA --" name="usuario_region" id="usuario_region" required tabindex="-1" aria-hidden="true">
                                                        <option value="none" selected disabled hidden>-- SELECCIONA --</option>
                                                        <option value="1">REGIÓN I - TANTOYUCA</option>
                                                        <option value="2">REGIÓN II - TUXPAN</option>
                                                        <option value="3">REGIÓN III - POZA RICA</option>
                                                        <option value="4">REGIÓN IV - MTZ DE LA TORRE</option>
                                                        <option value="5">REGIÓN V - XALAPA</option>
                                                        <option value="6">REGIÓN VI - VERACRUZ</option>
                                                        <option value="7">REGIÓN VII - CORDOBA</option>
                                                        <option value="8">REGIÓN VIII - ORIZABA</option>
                                                        <option value="9">REGIÓN IX - COSAMALOAPAN</option>
                                                        <option value="10">REGIÓN X - SAN ANDRES TUXTLA</option>
                                                        <option value="11">REGIÓN XI - MINATITLAN</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label">DELEGACIÓN: <span class="tx-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
                                                    <select class="form-control select2 "  style="color:#868e96; width:100%"  data-placeholder="-- SELECCIONA --" name="usuario_delegacion" id="usuario_delegacion" required tabindex="-1" aria-hidden="true">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        

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
