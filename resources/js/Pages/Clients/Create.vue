<template>
  <layout>
    <div>
      Olá {{ $page.props.user.name }}, você está na tela de cadastro de clientes
    </div>

  <form @submit.prevent="handleForm">
    <input type="text" placeholder="Seu nome" name="name" v-model="form.name">

    <select v-model="form.city" id="city_select">
      <option selected disabled>Selecione</option>
      <option v-for="city in cities" :key="city.id" :value="city.id">{{city.city_name}}</option>
    </select>

    <button type="submit">Cadastrar</button>
  </form>

  </layout>
</template>

<script>
  import Layout from '../../Layouts/AppLayout.vue';
  export default {
    layout: Layout,
    props: [
      'cities'
    ],
    data: () => {
    return {
      form: {
        name: null,
        city: null,
      }
    }
  },
  methods: {
    handleForm() {
      this.$inertia.post('/clients/create', this.form);
    }
  }
  };
</script>

<style>

</style>