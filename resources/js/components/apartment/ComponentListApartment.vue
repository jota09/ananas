<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">Lista de Apartamentos</div>

          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">propietario</th>
                  <th scope="col">ubicacion</th>
                  <th scope="col">tamaño</th>
                  <th scope="col">creado</th>
                  <th scope="col">actualizado</th>
                </tr>
              </thead>
              <tbody id="apartment-list">
                  <tr v-for="apartment in listApartment" :key="apartment.id">                    
                    <th scope="row">{{ apartment.id }}</th>
                    <td>{{ apartment.propietario }}</td>
                    <td>{{ apartment.ubicacion }}</td>
                    <td>{{ apartment.tamano }}</td>
                    <td>{{ apartment.create_at }}</td>
                    <td>{{ apartment.update_at }}</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['listApartment'],
  mounted() {
    console.log("Tabla de apartamentos.");
  }
};
</script>
