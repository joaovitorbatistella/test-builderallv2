<template>
  <layout>
    <pre>
      Olá {{ $page.props.user.name }} você está na crud de clientes
    </pre>

    <div v-for="user in users" :key="user.id">
      {{ user.name }}
    </div>

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
        <td>{{ client.city }}</td>
        <td><a v-bind:href="'clients/edit/'+ client.id"><img/></a></td>
        <td><a v-bind:href="'clients/remove/'+ client.id"><img/></a></td>
      </tr>
  </table>

  </layout>
</template>

<script>
import Button from '../../Jetstream/Button.vue';
  import Layout from '../../Layouts/AppLayout.vue';
  export default {
  components: { Button },
    layout: Layout,
    props: [
      'clients'
    ],
  };
</script>

<style>

</style>