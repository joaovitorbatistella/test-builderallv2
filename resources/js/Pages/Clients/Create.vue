<template>
  <layout>
    <pre class="welcome">
      Olá <bold class="p">{{ $page.props.user.name }}</bold>, você está na tela de cadastro de clientes
    </pre>


      <form class="form-content" @submit.prevent="handleForm">
        <label for="">Nome completo: </label>
        <input class="form-content-input" type="text" placeholder="Seu nome" name="name" v-model="form.name">
        <label for="">Cidade: </label>
        <select class="form-content-select" v-model="form.city" id="city_select">
          <option selected disabled >Selecione uma cidade</option>
          <option v-for="city in cities" :key="city.id" :value="city.id">{{city.city_name}}</option>
        </select>
      <button class="button-content-submit" type="submit">Cadastrar</button>
      <a class="button-content-reset" href="/clients">Voltar</a>
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
        name: '',
        city: '',
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