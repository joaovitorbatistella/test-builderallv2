<template>
  <layout>
    <pre class="welcome">
      Olá <bold class="p">{{ $page.props.user.name }}</bold>, você está na tela de cadastro de clientes
    </pre>

  <div class="cnt-content">
    <form @submit.prevent="handleForm">
      <input type="text" placeholder="Seu nome" name="name" v-model="updateForm.name">

      <select v-model="updateForm.city_id" id="city_select">
        <option selected disabled :value="updateForm.city_id">{{updateForm.city_name}}</option>
        <option v-for="city in cities" :key="city.id" :value="city.id">{{city.city_name}}</option>
      </select>

      <button type="submit">Atualizar</button>
    </form>
  </div>
  

  </layout>
</template>

<script>
  import Layout from '../../Layouts/AppLayout.vue';
  export default {
    layout: Layout,
    props: [
      'cities',
      'client',
    ],

    data() {
      return {
        updateForm: this.$inertia.form({
          name: this.client.name,
          city_name: this.client.city_name,
          city_id: this.client.city_id
        }),
      };
    },
  methods: {
    handleForm() {
      this.$inertia.put(`/clients/edit/${this.client.id}`, this.updateForm);
    }
  }
  };
</script>

<style>

</style>