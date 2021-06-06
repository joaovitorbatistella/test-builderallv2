<template>
  <layout>
    <pre class="welcome">
      Olá <bold class="p">{{ $page.props.user.name }}</bold>, você está vendo detalhes do cliente <bold class="p">{{ client.name }}</bold>!
    </pre>

    <div class="cnt-content">
      <div class="show-clients">
        <p><bold class="p">ID: </bold>{{ client.id }}</p>
        <p><bold class="p">Nome: </bold>{{ client.name }}</p>
        <p><bold class="p">Cidade: </bold>{{ client.city_name }}</p>
      </div>
    </div>
    
  </layout>
</template>

<script>
  import Layout from '../../Layouts/AppLayout.vue';
  export default {
    layout: Layout,
    props: [
      'client'
    ],
  };
</script>

<style>

</style>