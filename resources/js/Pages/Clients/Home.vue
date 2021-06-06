<template>
  <layout>
    <pre>
      Olá {{ $page.props.user.name }} você está na crud de clientes
    </pre>

    <div>
      <a href="/clients/create">Novo Cliente</a>
    </div>

    <table style="width:100%">
      <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Cidade</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
      <tr v-for="client in clients" :key="client.id">
        <td><a v-bind:href="'clients/show/'+ client.id">{{ client.id }}</a></td>
        <td>{{ client.name }}</td>
        <td>{{ client.city_name }}</td>
        <td><a v-bind:href="'clients/edit/'+ client.id">CLICK</a></td>
        <td><a v-bind:href="'clients/delete/'+ client.id"><img/>CLICK</a></td>
      </tr>
  </table>

  </layout>
</template>

<script>
  import Layout from '../../Layouts/AppLayout.vue';
  export default {
    layout: Layout,
    props: [
      'clients'
    ],
  };
</script>

<style>

</style>