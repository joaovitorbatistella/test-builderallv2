<template>
  <layout>
    <pre class="welcome">
      Olá <bold class="p">{{ $page.props.user.name }}</bold>, você está vendo detalhes do cliente <bold class="p">{{ client.name }}</bold>!
    </pre>

    <div class="cnt-content">
      <div>
    <dl>
      <dt>ID</dt>
            <dd>{{ client.id }}</dd>
      <dt>Nome</dt>
            <dd>{{ client.name }}</dd>
      <dt>Cidade</dt>
            <dd>{{ client.city_name }}</dd>
    </dl>
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