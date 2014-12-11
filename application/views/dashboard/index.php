<div class="content">
    <div  class="form">
    		<form  method="post" action="<?php echo URL; ?>dashboard/create" id="contactform"> 
    			<h2> Ingresar Jovén </h2></br>
    			<p class="contact"><label for="nombre">Nombre</label></p> 
    			<input id="nombre_joven" name="nombre_joven" placeholder="Escriba el nombre" required="" type="text"> 
    			 
    			<p class="contact"><label for="apellido">Apellido</label></p> 
    			<input id="apellido" name="apellido" placeholder="Apellido" required="" type="text">

    			<fieldset>
    				<label>Sexo</label>
    					<label class="sexo">
    						<select class="select-style gender" name="sexoper">
    							<option value"">Sexo</option>
    								<option  value="MASCULINO">Masculino</option>
                  					<option value="FEMENINO">Femenino</option>
                  		</label>
                  			</select>
                 </fieldset>

    			<p class="contact"><label for="edad">Edad</label></p> 
    			<input id="edad" name="edad" placeholder="Edad" required="" type="text">  
                
                <p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email" placeholder="correo@dominio.com" required="" type="email"> 

                <fieldset>
    				<label>Vehiculo</label>
    					<label class="sexo">
    						<select class="select-style gender" name="auto">
    							<option value"">¿Tiene vehiculo la familia?</option>
    								<option  value="SI">Si</option>
                  					<option value="NO">No</option>
                  		</label>
                  			</select>
                 </fieldset>

                 <p class="contact"><label for="encargado">Encargado</label></p> 
    			<input id="encargardo" name="encargado" placeholder="¿Quien cuidara por el grupo?" type="text">

          <p class="contact"><label for="iglesia">Iglesia</label></p> 
          <input id="iglesia" name="iglesia" placeholder="iglesia de origen" type="text">

          <p class="contact"><label for="ciudad">Ciudad</label></p> 
          <input id="ciudad" name="ciudad" placeholder="Ciudad de origen" type="text">

          <p class="contact"><label for="telefono">Telefono</label></p> 
          <input id="telefono" name="telefono" placeholder="*No obligatorio*" type="tel">
 				</br>
 				<input type="submit" value='¡Registrar!' autocomplete="off" />
 			</form>
</div>