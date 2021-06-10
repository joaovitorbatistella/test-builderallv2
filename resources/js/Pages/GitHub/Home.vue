<template>
  <pre>GitHub API</pre>
    <div class="cnt-content">
      <div class="navi">
        <div class="crud-search">
          <label for="search">Search: </label>
          <input class="crud-search-input" id="search" type="text" style="margin-right:" v-model="term">
          <button class="button-content-submit" type="submit" @click="search">Pesquisar</button>
        </div>
      </div>
      <div id="a" v-if="gitResponse.length">
        <table class="table-crud" align="center">
          <tr>
            <th>ID</th>
            <th>Nome do Repositório</th>
            <th>Proprietário</th>
          </tr>
    
          <tr v-for="(git, index) in gitResponse" :key="git.id" :class="{'bg-gray-300': index%2 === 0}">
            <td class="table-crud-td" align="center"><a v-bind:href="git.owner.html_url + '/' + git.name">{{ git.id }}</a></td>
            <td class="table-crud-td" align="center">{{ git.name }}</td>
            <td class="table-crud-td" align="center">{{ git.owner.login }}</td>
          </tr>
        </table>
      </div>
      <div id="b" v-else>
        <div align="center">
          <p>Nenhum resultado encontrado!</p>
        </div>
      </div>
    </div>
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
      gitResponse: Object
    },
    methods: {
     search() {
        this.$inertia.get("/github", { term: this.term }, { preserveState: true });
      },
    }
  }
</script>
