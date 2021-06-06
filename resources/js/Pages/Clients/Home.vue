<template>
  <layout>
    <pre>
      Olá {{ $page.props.user.name }} você está na crud de clientes
    </pre>

    <div>
      <a href="/clients/create">Novo Cliente</a>
    </div>

    <div>
      <label for="search">Search</label>
      <input id="search" type="text" v-model="term" @keyup="search">
    </div>

    <table style="width:100%">
      <tr>
        <th @click="orderById">Código</th>
        <th @click="orderByName">Nome</th>
        <th @click="orderByCity">Cidade</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
      <tr v-for="(client, index) in clients.data" :key="client.id" :class="{'bg-gray-300': index%2 === 0}">
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
    data() {
      return {
        term: '',
      }
    },
    props: {
      clients: Object
    },
    methods: {
      search() {
        this.$inertia.get("/clients", { term: this.term }, { preserveState: true });
      },
      orderById() {
        this.$inertia.get("/clients", { order: 'id' }, { preserveState: true });
      },
      orderByName() {
        this.$inertia.get("/clients", { order: 'name' }, { preserveState: true });
      },
      orderByCity() {
        this.$inertia.get("/clients", { order: 'city_name' }, { preserveState: true });
      }
    }
  }
</script>

<style>

</style>