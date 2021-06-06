<template>
  <layout>
    <pre class="welcome">
      Olá <bold class="p">{{ $page.props.user.name }}</bold>, você está na tela de exclusão
    </pre>

    <form class="form-content" @submit.prevent="handleForm">
      <h2 style="margin-bottom: 20px">{{ $page.props.user.name }}, você deseja deletar "{{client.name}}"?</h2>

      <button class="button-content-submit" type="submit">Sim</button>
      <a class="button-content-reset" href="/clients">Não</a>
    </form>  

  </layout>
</template>

<script>
  import Layout from '../../Layouts/AppLayout.vue';
  export default {
    layout: Layout,
    props: [
      'client',
    ],

    data() {
      return {
        updateForm: this.$inertia.form({
          name: this.client.name,
          id: this.client.id,
        }),
      };
    },
  methods: {
    handleForm() {
      this.$inertia.delete(`/clients/delete/${this.client.id}`, this.updateForm);
    }
  }
  };
</script>

<style>

</style>