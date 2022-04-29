<form action="{{route('form.insertHijo')}}" method="POST" role="form" autocomplete="off" name="formulario" id="form-horizontal">
                    @csrf
                                    
                    <h3>Datos Personales</h3>
                    <fieldset>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="mb-3 row" >
                                    <label for="txtFirstNameBilling"
                                        class="col-lg-3 col-form-label">Nombres</label>
                                    <div class="col-lg-9" id="grupo__txtPrincipal__Nombre">
                                        <input id="txtPrincipal__Nombre" name="txtPrincipal__Nombre"
                                            type="text" class="form-control" onfocusout="valFormulario('grupo__txtPrincipal__Nombre','txtPrincipal__Nombre')" required>
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                            
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="txtLastNameBilling"
                                        class="col-lg-3 col-form-label">No. de Pasaporte</label>
                                    <div class="col-lg-9" id="grupo__txtPrincipal__PasaporteHijo">
                                        <input id="txtPrincipal__PasaporteHijo" name="txtPrincipal__Pasaporte"
                                            type="text" class="form-control" onfocusout="valFormulario('grupo__txtPrincipal__PasaporteHijo','txtPrincipal__PasaporteHijo')" required>
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="txtCompanyBilling"
                                        class="col-lg-3 col-form-label">Apellidos</label>
                                    <div class="col-lg-9" id="grupo__txtPrincipal__Apellido">
                                        <input id="txtPrincipal__Apellido" name="txtPrincipal__Apellido"
                                            type="text" class="form-control" onfocusout="valFormulario('grupo__txtPrincipal__Apellido','txtPrincipal__Apellido')" required>
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="txtEmailAddressBilling"
                                        class="col-lg-3 col-form-label">Sexo</label>
                                    <div class="col-lg-9">
                                        <select name="txtPrincipal__Sexo" id="" class="form-control">
                                            <option value="M" selected>Masculino</option>
                                            <option value="F" >Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="txtCompanyBilling"
                                        class="col-lg-3 col-form-label">Correo</label>
                                    <div class="col-lg-9" id="grupo__txtPrincipal__Email">
                                        <input id="txtPrincipal__Email" name="txtPrincipal__Email"
                                            type="email" class="form-control" onfocusout="valFormulario('grupo__txtPrincipal__Email','txtPrincipal__Email')" >
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="txtEmailAddressBilling"
                                        class="col-lg-3 col-form-label">Estatus Migratorio</label>
                                    <div class="col-lg-9">
                                        <select name="txtPrincipal__EstatusMigratorio" id="selectEstatusMigratorio" class="form-control" onchange="showElementsMigratorio('selectEstatusMigratorio','grupo__txtPrincipal__EstatusMigratorio__Otro');">
                                            @foreach($estados as $estado)
                                            @if($estado->tipo == 'Migratorio')
                                                <option>{{$estado->nombre}}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 display__none" id="grupo__txtPrincipal__EstatusMigratorio__Otro">
                                        <input name="txtPrincipal__EstatusMigratorio__Otro"
                                            type="text" class="form-control">
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">

                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <!-- <label for="txtAddress2Billing"
                                        class="col-lg-3 col-form-label">Estado Civil</label>
                                    <div class="col-lg-9">
                                        
                                            <select name="txtPrincipal__Estado" id="selectEstado" class="form-control" >
                                            @foreach($estados as $estado)
                                            @if($estado->tipo == 'Civil')
                                                <option>{{$estado->nombre}}</option>
                                            @endif
                                        @endforeach

                                        </select>
                                    </div> -->
                                    
                                </div>
                            </div>
                            
                        </div>
                        



                        
                        


                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="txtCityBilling"
                                        class="col-lg-3 col-form-label">Fecha de Nacimiento</label>
                                    <div class="col-lg-9">
                                        <input id="txtPrincipal__FechaNacimiento" min="{{\Carbon\Carbon::now()->subYears(18)->format('Y-m-d')}}" max="{{\Carbon\Carbon::now()->format('Y-m-d')}}" name="txtPrincipal__FechaNacimiento" type="date"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 " >
                                <div class="mb-3 row">
                                <label for="txtTelephoneBilling"
                                        class="col-lg-3 col-form-label">Pais de Nacimiento</label>

                                    <div class="col-lg-9">
                                    <select name="txtPrincipal__Pais" class="form-control">
                                        @foreach($pais as $pais)
                                        <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                                        @endforeach            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        

                        
                        

                        <div class="row">
                            <div class="col-md-6">
                                
                            </div>
                            
                            <div class="col-md-6 display__none" id="div__changes-personasviven">
                                <div class="mb-3 row " >
                                    <div class="col-lg-12">
                                        <input id="txtPersonasOtro" name="txtPersonasOtro" type="text"
                                            class="form-control" >
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="txtCityBilling"
                                        class="col-lg-3 col-form-label">Persona Responsable</label>
                                    <div class="col-lg-9">
                                        <input id="txtPersonaResponsable" name="txtPersonaResponsable"
                                         type="text"    class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 " >
                                <div class="mb-3 row">
                                <label for="txtTelephoneBilling"
                                        class="col-lg-3 col-form-label">Parentesco</label>

                                    <div class="col-lg-9">
                                    <select name="txtParentesco" class="form-control">
                                        @foreach($estados as $estado)
                                            @if($estado->tipo == 'Parentesco')
                                                <option>{{$estado->nombre}}</option>
                                            @endif>
                                        @endforeach            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </fieldset>

                    <!-- <h3>Hijos</h3>
                    <fieldset>
                        <div id="contenedor__hijo">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                                        
                                        <div class="col-lg-3 mb-3">
                                            <label for="txtFirstNameBilling"
                                                class="col-form-label">Tiene Hijos</label>
                                            <div class="form-check form-check-inline " >
                                                <input class="form-check-input" type="checkbox" id="checkHijo" name="txtHijo__Conf" value="1" onclick="Check('checkHijo','cantidad__hijos');">
                                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="checkssHijo" name="txtHijo__Conf" value="0">
                                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                                            </div> 
                                        </div>
                                        <div class="col-lg-6 display__none mb-3" id="cantidad__hijos">
                                            <div class="row">
                                                <div class="col-lg-3 mb-3">
                                                    <label for="txtFirstNameBilling"
                                                    class="col-form-label">Cantidad</label>
                                                </div>
                                                <div class="col-lg-3 mb-3">
                                                    
                                                    <input id="txtHijo__Cantidad" name="txtHijo__Cantidad"
                                                        type="number" class="form-control">
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <h2 class=" btn btn-primary text-center w-100" id="btnadd" onclick="agregarNuevoHijo();">Agregar
                                                    </h2>
                                                </div>
                                            </div>
                                                            
                                        </div>
                                    </div>
                                </div>

                                                
                                <div class="clonar display__none">
                                    <div class="row">
                                            
                                        <h2 id="titulo__hijos"></h2>
                                        <hr />
                                        <div class="col-md-6">
                                            
                                            <div class="mb-3 row">
                                                <label for="txtFirstNameBilling"
                                                
                                                    class="col-lg-3 col-form-label">Nombres</label>
                                                <div class="col-lg-9">
                                                    <input id="txtNombres" name="txtHijo__Nombre[]"
                                                        type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="txtLastNameBilling"
                                                    class="col-lg-3 col-form-label">No. de Pasaporte</label>
                                                <div class="col-lg-9">
                                                    <input id="txtNoPasaporte" name="txtHijo__Pasaporte[]"
                                                        type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="txtCompanyBilling"
                                                    class="col-lg-3 col-form-label">Apellidos</label>
                                                <div class="col-lg-9">
                                                    <input id="txtCompanyBilling" name="txtHijo__Apellido[]"
                                                        type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="txtEmailAddressBilling"
                                                    class="col-lg-3 col-form-label">Sexo</label>
                                                <div class="col-lg-9">
                                                    <select name="txtHijo__Sexo[]" id="" class="form-control">
                                                        <option value="M" selected>Masculino</option>
                                                        <option value="F" >Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="txtCompanyBilling"
                                                    class="col-lg-3 col-form-label">Correo</label>
                                                <div class="col-lg-9">
                                                    <input id="" name="txtHijo__Email[]"
                                                        type="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="txtEmailAddressBilling"
                                                    class="col-lg-3 col-form-label">Estatus Migratorio</label>
                                                <div class="col-lg-3">
                                                    <select name="txtHijo__EstatusMigratorio[]" id="selectEstatusMigratorioHijo" class="form-control" >
                                                        <option value="Residente Temporal" selected>Residente Temporal</option>
                                                        <option value="Residente Permanente" >Residente Permanente</option>
                                                        <option value="Solicitante de Refugio" >Solicitante de Refugio</option>
                                                        <option value="Refugiado" >Refugiado</option>
                                                        <option value="Irregular" >Irregular</option>
                                                        <option value="0" >Otro</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 " id="div__Estatus-migratorioHijo">
                                                    <input name="txtHijo__EstatusMigratorio__Otro[]"
                                                        type="email" class="form-control" placeholder="Otro">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    

                                    
                                        


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="txtCityBilling"
                                                    class="col-lg-3 col-form-label">Fecha de Nacimiento</label>
                                                <div class="col-lg-9">
                                                    <input id="txtHijo__FechaNacimiento[]" name="txtHijo__FechaNacimiento[]" type="date"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                            <label for="txtTelephoneBilling"
                                                    class="col-lg-3 col-form-label">Nivel de Educación</label>

                                                <div class="col-lg-3">
                                                <select name="txtHijo__Instruccion[]" id="educacionn" class="form-control">
                                                    
                                                    <option value="Nivel Primaria">Nivel Primaria</option>
                                                    <option value="Nivel Pre-Media">Nivel Pre-Media</option>
                                                    <option value="Bachillerato">Bachillerato</option>
                                                    <option value="Nivel Técnico Superior">Nivel Técnico Superior</option>
                                                    <option value="Universitario">Universitario</option>
                                                    <option value="Maestria">Maestria</option>
                                                    <option value="Doctorado">Doctorado</option>
                                                    <option value="0">Otro</option>
                                                                
                                                    </select>

                                                    
                                                </div>
                                                <div class="col-lg-6">
                                                <input id="" name="txtHijo__Instruccion__otro[] " placeholder="Otro" type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="txtTelephoneBilling"
                                                    class="col-lg-3 col-form-label">Pais de Nacimiento</label>

                                                <div class="col-lg-9">
                                                <select name="txtHijo__Pais[]" class="form-control">
                                                    @foreach($pais2 as $paiss)
                                                    <option value="{{$paiss->id}}">{{$paiss->nombre}}</option>
                                                    @endforeach            
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6" id="educacion__otro" >
                                            <div class="mb-3 row">
                                            <label for="txtTelephoneBilling"
                                                    class="col-lg-3 col-form-label"></label>

                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    <hr />
                                </div>
                            </div>
                                            
                        </div>
                                     
                    </fieldset> -->

                    <h3>Dirección</h3>
                    <fieldset>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 row">
                                    
                                    <div class="col-lg-12">
                                        <label for="txtFirstNameShipping"
                                            class="col-lg-12 col-form-label">Provincia </label>
                                        <select name="txtPrincipal__Provincia" id="select__provincia" class="form-control">
                                            <option value="0" >Seleccione Provincia</option>
                                            @foreach($provincia as $provincia)
                                                <option value="{{$provincia->id}}" >{{$provincia->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-4">
                                <div class="mb-3 row">
                                    <div class="col-lg-12" >
                                        <label for="txtCompanyShipping"
                                            class="col-lg-12 col-form-label">Distrito</label>
                                        
                                        <select name="txtPrincipal__Distrito" id="select__distrito" class="form-control">
                                            
                                            <option value="0" >Seleccione Distrito</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                       
                            

                                            
                            <div class="col-md-4">
                                <div class="mb-3 row">
                                
                                    <div class="col-lg-12">
                                        <label for="txtCityShipping"
                                            class="col-lg-12 col-form-label">Corregimiento</label>
                                        <select name="txtPrincipal__Corregimiento" id="select__corregimiento" class="form-control">
                                            
                                            <option value="0" >Seleccione Corregimiento</option>
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    
                        <div class="row">

                            

                            <div class="col-md-6">
                                <div class="mb-3 row">


                                    <label for="txtLastNameShipping"
                                        class="col-lg-12 col-form-label">Dirección </label>
                                    <div class="col-lg-12" id="grupo__txtPrincipal__Direccion">
                                        <input id="txtPrincipal__Direccion" name="txtPrincipal__Direccion"
                                            type="text" class="form-control" onfocusout="valFormulario('grupo__txtPrincipal__Direccion','txtPrincipal__Direccion')" required>
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                            
                                    </div>




                                    
                                </div>
                            </div>
                            
                        
                        

                        
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="txtEmailAddressShipping"
                                        class="col-lg-12 col-form-label">No. Telefónico</label>
                                    <div class="col-lg-12" id="grupo__txtPrincipal__Telefono">
                                        <input id="txtPrincipal__Telefono"
                                            name="txtPrincipal__Telefono" type="text"
                                            class="form-control" onfocusout="valFormulario('grupo__txtPrincipal__Telefono','txtPrincipal__Telefono')" >
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                            
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="mb-3 row">
                                
                                </div>
                            </div>
                            
                        </div>
                        
                    </fieldset>
                                        
                    <h3>Nivel Academico</h3>
                    <fieldset>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="txtCreditCardNumber"
                                        class="col-lg-3 col-form-label">Nivel de Instrucción</label>
                                    <div class="col-lg-9">
                                        <select name="txtPrincipal__Instruccion" id="checkEducacionOtro" class="form-control" onchange="personasCheck('checkEducacionOtro','div__changes-nivelInstrucion');">
                                            @foreach($estados as $estado)
                                                @if($estado->tipo == 'Academico')
                                                    <option>{{$estado->nombre}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                           
                       
                                
                            <div class="col-md-6 display__none" id="div__changes-nivelInstrucion">
                                <div class="mb-3 row " >
                                    <div class="col-lg-12" id="grupo__txtPrincipal__Instruccion__Otro">
                                        <input id="txtPersonasOtro" name="txtPrincipal__Instruccion__Otro" type="text"
                                            class="form-control" >
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                                           

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    
                                    
                                </div>
                            </div>
                            
                            <div class="col-md-6 display__none" id="txtOcupacion__otra">
                                <div class="mb-3 row">
                                    <div class="col-lg-12"  id="grupo__txtPrincipal__Ocupacion__Otro">
                                        <input 
                                            name="txtPrincipal__Ocupacion__Otro" type="text"
                                            class="form-control">
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <!-- <label for="txtTelephoneBilling"
                                        class="col-lg-3 col-form-label">Situación Laboral Actual</label>

                                    <div class="col-lg-9">
                                    <select name="txtPrincipal__SituacionLaboral" id="checkSituacionLaboral" class="form-control" onchange="personasCheck('checkSituacionLaboral','div__changes-situacionLaboral');">
                                            
                                    @foreach($estados as $estado)
                                            @if($estado->tipo == 'Laboral')
                                                <option>{{$estado->nombre}}</option>
                                            @endif
                                        @endforeach

                                            
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                            
                            <div class="col-md-6 display__none" id="div__changes-situacionLaboral">
                                <div class="mb-3 row " >
                                    <div class="col-lg-12" id="grupo__txtPrincipal__SituacionLaboral__Otro">
                                        <input id="txtPersonasOtro" name="txtPrincipal__SituacionLaboral__Otro" type="text"
                                            class="form-control" >
                                            <i class="fa fa-times-circle validacion__estado"></i>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <!-- <label for="txtCityShipping"
                                        class="col-lg-3 col-form-label">Ingreso Promedio Mensual - Familiar</label>
                                    <div class="col-lg-9" id="grupo__txtPrincipal__Ingreso">
                                        <input id="txtPrincipal__Ingreso" name="txtPrincipal__Ingreso"
                                            type="number" class="form-control" onfocusout="valFormulario('grupo__txtPrincipal__Ingreso','txtPrincipal__Ingreso')" required >
                                            
                                    </div> -->
                                </div>
                            </div>
                            
                            <div class="col-md-12 " id="div__changes-nivelInstrucion">
                                <div class="mb-3 row " >
                                <label for="txtCityShipping"
                                        class="col-lg-3 col-form-label">Explique, Por qué necesita Ayuda?</label>
                                    <div class="col-lg-12" id="grupo__txtPrincipal__Comentario">
                                    <textarea class="form-control" id="elm1" name="txtPrincipal__Comentario"></textarea>
                                    <i class="fa fa-times-circle validacion__estado"></i>    
                                </div>
                                    
                                </div>
                            </div>
                            

                        </div>
                        <input class="btn btn-primary col-lg-12" type="submit" value="Enviar Datos"> 
                        <h1></h1>
                        
                        
                    </fieldset>
                                       
                                        
                </form>