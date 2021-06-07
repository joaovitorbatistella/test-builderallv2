<template>
  <layout>
    <pre class="welcome">
      Olá <bold class="p">{{ $page.props.user.name }}</bold>, você está na tela de cadastro de clientes
    </pre>


    <form class="form-content" @submit.prevent="handleForm">
      <label for="">Nome completo: </label>
      <input class="form-content-input" type="text" placeholder="Seu nome" name="name" v-model="updateForm.name">
      <label for="">Cidade: </label>
      <select class="form-content-select" v-model="updateForm.city_id" id="city_select">
        <option class="form-content-input" selected disabled :value="updateForm.city_id">{{updateForm.city_name}}</option>
        <option v-for="city in cities" :key="city.id" :value="city.id">{{city.city_name}}</option>
      </select>

      <button class="button-content-submit" type="submit">Atualizar</button>
      <a class="button-content-reset" href="/clients">Voltar</a>
    </form>

  

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