<template>
  <layout>
    <div>
      Olá {{ $page.props.user.name }}, você está na tela de cadastro de clientes
    </div>

  <form action="/clients/create" method="post">
    <input type="text" placeholder="Nome do cliente" name="" id="">
    <input type="email" placeholder="Email do cliente" name="" id="">
    <select>
      <option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
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
    ]
  };
</script>

<style>

</style>