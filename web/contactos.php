<!--DIV CONTACTO-->
                  <div id="tabs-5">
                      <!--DIV QUE CONTIENE EL FORMULARIO DE MENSAJE-->
                      <div class="center" align="center">
                          <center> 
                              <p class="center" id="mensForm">En caso de dudas, reclamos o sugerencias, lo invitamos a completar y enviar el</p> 
                              <p class="center" id="mensForm">siguiente formulario, y uno de nuestros asesores lo contactara; a la mayor brevedad posible.</p>
                              <p class="center" id="mensForm">Recuerde que todos los campos marcados con <span style="font-weight: bolder; color: red;">*</span> deben estar completos.</p>                              </br>
                          </center>
                          <!--FORMULARIO DE MENSAJE-->
                          <form method="post">
                              <p class="center">Nombre y Apellido: <span style="font-weight: bolder; color: red;">*</span><br />
                                  <input size="30" class="form" name="nomApe" value="" type="text" id="nomApe"/>
                              </p>
                              <p class="center">E-Mail: <span style="font-weight: bolder; color: red;">*</span> <br />
                                  <input size="30" class="form" name="email" value="" type="text" id="email"/>
                              </p>
                              <p class="center">Asunto: <span style="font-weight: bolder; color: red;">*</span> <br />
                                  <input size="30" class="form" name="asunto" value="" type="text" id="asunto"/>
                              </p>
                              <p class="center">Mensaje: <span style="font-weight: bolder; color: red;">*</span> <br />
                                  <textarea name="mensContact" cols="28" rows="9" class="form" id="mensContact"></textarea>
                              </p>
                          </form>
                          <!--FIN FORMULARIO DE MENSAJE-->
                      </div>
                      <!--FIN DIV QUE CONTIENE EL FORMULARIO DE MENSAJE-->
                      <!--BOTON QUE ENVIA EL MENSAJE-->
                      <center>
                          <input type="submit" value="Enviar mensaje!" class="formsubmit" id="enviarMensaje"/><br />
                      </center>
                  </div>
                  <!--FIN DIV CONTACTO-->