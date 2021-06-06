<template>
  <layout>
    <pre>
      Olá {{ $page.props.user.name }} você está na crud de clientes
    </pre>

    <div>
      <b>{{ client.name }}</b>
    <dl>
      <dt>ID</dt>
            <dd>{{ client.id }}</dd>
      <dt>Nome</dt>
            <dd>{{ client.name }}</dd>
      <dt>Cidade</dt>
            <dd>{{ client.city_name }}</dd>
    </dl>
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