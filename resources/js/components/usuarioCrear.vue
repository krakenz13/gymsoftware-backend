 <template>
     
    <div class="container text-center">
      <h2 class="my-4">clientes vencidos</h2>
      <form @submit.prevent="getEstudiantes">
        <div class="d-grid col-4 mx-auto mb-3">
          <label>Nombre:</label>
          <input class="form-control" v-model="productName" />
        </div>
        <div class="d-grid col-4 mx-auto mb-1">
          <label>Fecha de vencimiento:</label>
          <input class="form-control" type="date" v-model="expirationDate" />
        </div>
        
         <button class="btn btn-secondary" type="submit">Agregar</button>
        
      </form>
      <h2 class="my-4">Listar clientes</h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
              <th>
              <td>ID</td>
              </th>
              <th>
              <td>Foto</td>
              </th>
              <th>
              <td>Nombre</td>
              </th>
              <th>
              <td>Apellido</td>
              </th>
              <th>
              <td>Cedula</td>
              </th>
              <th>
              <td>Telefono</td>
              </th>
              <th style="white-space: nowrap;">
              <td>Tipo de mentoria</td>
              </th>
              <th>
              <td>Registro</td>
              </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="estudiante in usuarios" :key="estudiante.id">
            <td>{{ estudiante.name }}</td>
            <td v-text="estudiante.nombre"> </td>
              <td v-text="estudiante.apellido"></td>
              <td v-text="estudiante.cedula"></td>
              <td v-text="estudiante.telefono"></td>
              <td v-text="estudiante.mentoria"></td>
              <td v-text="new Date(est.created_at).toLocaleDateString('en-US')"> </td>
            <td>{{ estudiante.expirationDate | formatDate }}</td>
            <td :class="getStatusClass(estudiante.expirationDate)">
              {{ getStatus(estudiante.expirationDate) }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  

  
  export default {
    data() {
      return {
        productName: "",
        expirationDate: "",
        usuario: [],
      };
    },
    methods: {
      getEstudiantes() {
        const estudiante = {
          name: this.productName,
          expirationDate: this.expirationDate,
        };
        this.estudiantes.push(estudiante);
        this.productName = "";
        this.expirationDate = "";
      },
      getStatus(date) {
        const now = moment();
        const expiration = moment(date);
        const diff = expiration.diff(now, "days");
        if (diff < 0) {
          return "Caducado";
        } else if (diff <= 7) {
          return "Por caducar";
        } else {
          return "A tiempo";
        }
      },
      getStatusClass(date) {
        const now = moment();
        const expiration = moment(date);
        const diff = expiration.diff(now, "days");
        if (diff < 0) {
          return "table-danger";
        } else if (diff <= 7) {
          return "table-warning";
        } else {
          return "table-success";
        }
      },
    },
    filters: {
      formatDate(date) {
        return moment(date).format("DD/MM/YYYY");
      },
    },
  };
  </script>