<template>
  <layout>
     <pre class="welcome">
      Olá <bold class="p">{{ $page.props.user.name }}</bold>, você está na crud de clientes!
    </pre>

    <div class="cnt-content">
      <div class="navi">
        <div class="crud-button-new">
          <a class="a-button-new" href="/clients/create">Novo Cliente</a>
        </div>

        <div class="crud-search">
          <label for="search">Search: </label>
          <input class="crud-search-input" id="search" type="text" v-model="term" @keyup="search">
        </div>
      </div>
      <div id="a" v-if="clients.data.length">
        <table class="table-crud" align="center">
            <tr>
              <th @click="orderById">Código</th>
              <th @click="orderByName">Nome</th>
              <th @click="orderByCity">Cidade</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
            <tr v-for="(client, index) in clients.data" :key="client.id" :class="{'bg-gray-300': index%2 === 0}">
              <td class="table-crud-td" align="center"><a v-bind:href="'clients/show/'+ client.id">{{ client.id }}</a></td>
              <td class="table-crud-td" align="center"><a v-bind:href="'clients/show/'+ client.id">{{ client.name }}</a></td>
              <td class="table-crud-td" align="center"><a v-bind:href="'clients/show/'+ client.id">{{ client.city_name }}</a></td>
              <td class="table-crud-td" align="center"><a v-bind:href="'clients/edit/'+ client.id">CLICK</a></td>
              <td class="table-crud-td" align="center"><a v-bind:href="'clients/delete/'+ client.id"><img/>CLICK</a></td>
            </tr>
        </table>
      </div>
      <div id="b" v-else>
        <div align="center">
          <p>Nenhum resultado encontrado!</p>
        </div>
      </div>
        
      </div>

  </layout>
</template>

<script>
  import Layout from '../../Layouts/AppLayout.vue';
  export default {
    layout: Layout,
    data() {
      return {
        term: '',
        enabled: '',
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