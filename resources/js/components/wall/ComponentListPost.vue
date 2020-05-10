<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">List of Post</div>

          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Text</th>
                  <th scope="col">By</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody id="post-list">
                  <tr v-for="post in listPost" :key="post.id">                    
                    <th scope="row">{{ post.id }}</th>
                    <td>{{ post.ptext }}</td>
                    <td>{{ post.pby }}</td>
                    <td>{{ post.pdate }}</td>
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
  props: ['listPost'],
  mounted() {
    console.log("Table of posts.");
  }
};
</script>
