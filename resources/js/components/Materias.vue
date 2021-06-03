<template>
	<div>
		<h1 align="center" class="tex-center">Materias</h1>
		<hr>
		<div class="col-12">
			<div class="row">
				<div class="col-3"><input type="text" class="form-control" name="nombre" id="nombre" v-model="materia.nombre"></div>
				<div class="col-3"><input type="text" class="form-control" name="docente" id="docente" v-model="materia.docente"></div>
				<div class="col-3">
					<select class="form-control" name="tipo" id="tipo" v-model="materia.tipo">
						<option value="">Seleccione</option>
						<option value="Cualitativa">Cualitativa</option>
						<option value="Cuantitativa">Cuantitativa</option>
					</select>
				</div>
				<div class="col-3"><button class="btn btn-primary" @click="insertar()">Nueva</button></div>
			</div>
		</div>
		<div class="modal" :class="{mostrar:modal}">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Cambiar Datos de Materia</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <label for="materia">Nombre de la Materia</label>
		        <input type="text" name="materia" id="materia" class="form-control">
		        <label for="docente">Docente</label>
		        <input type="text" name="docente" id="docente" class="form-control">
		        <label for="t_materia">Nombre de la Materia</label>
		        <select class="form-control" name="t_materia" id="t_materia">
						<option value="">Seleccione</option>
						<option value="Cualitativa">Cualitativa</option>
						<option value="Cuantitativa">Cuantitativa</option>
					</select>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" @click="editar(materia.id)">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
		<table class="table">
			<thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Materia</th>
		      <th scope="col">Docente</th>
		      <th scope="col">Tipo de Materia</th>
		      <th scope="col" colspan="2">Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr v-for="materia in materias" :key="materia.id">
		      <th scope="row">{{ materia.id }}</th>
		      <td>{{ materia.nombre_materia}}</td>
		      <td>{{ materia.docente }}</td>
		      <td>{{ materia.tipo_materia }}</td>
		      <td>
		      	<button class="btn btn-warning">Editar</button>
		      	<button class="btn btn-danger" @click="eliminar(materia.id)">Eliminar</button>
		      </td>
		    </tr>
		    
		  </tbody>
		</table>

		
	</div>
</template>

<script type="text/javascript">
	export default {

		data(){
			return {
				materia: {
					nombre: '',
					docente: '',
					tipo: '',
					status: '1'
				},
				materias:[],
				modal: 0,



			}
		},

		methods: {

			 async listar (){

				const res = await axios.get('/materias');
				this.materias = res.data;


			},
			async eliminar (id){

				const res = await axios.delete('/materias/delete/'+id);
				
				this.listar();

				// console.log(res);

			},

			async editar (data={}){

				
				const res = await axios.put('/materias/'+id);
				// this.materias = res.data;

				console.log(res);

			},

			async insertar (){

				const res = await axios.post('/materias/', this.materia);
				
				this.listar();

			},

			abrirModal(data={}){
				this.modal = 1;
				this.materia.nombre = data.nombre;
				this.materia.docente = data.docente;
				this.materia.tipo = data.tipo;

			},

		},

		created(){
			this.listar ();
		},

	}
</script>
<style>
	.mostrar{
		discplay: list-item;
		opacity: 1;
		background: rgba(44, 38, 75, 0, 849);
	}
</style>