<script setup>
import { ref, reactive } from 'vue';
import { router } from '@inertiajs/vue3'

const title = ref('Preencha os campos abaixo:');
const name = ref('');
const email = ref('');
const gender = ref('');
const description = ref('');
const password = ref('');
const showPassword = ref(false);


const form = reactive({
  name: null,
  email: null,
  gender: null,
  description: null,
  password: null,
})

function togglePasswordVisibility() {
  showPassword.value = !showPassword.value;
}

function submitForm() {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  router.post('/enviar-formulario', form, {
    headers: {
      'X-CSRF-TOKEN': csrfToken
    },
    onSuccess: (response) => {
      console.log('Formulário enviado com sucesso:', response);
      form.name = '';
      form.email = '';
      form.gender = '';
      form.description = '';
      form.password = '';
    },
    onError: (errors) => {
      console.error('Erros ao enviar o formulário:', errors);
    },
  });
}
</script>

<template>
  <form @submit.prevent="submitForm" class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
    <h2 class="text-2xl font-semibold text-gray-800">{{ title }}</h2>

    <div v-if="sessionMessage" class="alert alert-warning">
      {{ sessionMessage }}
    </div>

    <!-- Campo de Nome -->
    <div class="flex flex-col">
      <label for="name" class="mb-1 font-medium text-gray-700">Nome</label>
      <input 
        type="text" 
        id="name" 
        name="name"
        v-model="form.name" 
        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500" 
        placeholder="Digite seu nome">
    </div>

    <!-- Campo de Email -->
    <div class="flex flex-col">
      <label for="email" class="mb-1 font-medium text-gray-700">Email</label>
      <input 
        type="email" 
        id="email" 
        name="email"
        v-model="form.email" 
        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500" 
        placeholder="Digite seu e-mail">
    </div>

    <!-- Campo de Senha com botão de visibilidade -->
    <div class="flex flex-col">
      <label for="password" class="mb-1 font-medium text-gray-700">Senha</label>
      <div class="relative">
        <input 
          :type="showPassword ? 'text' : 'password'" 
          id="password" 
          name="password"
          v-model="form.password" 
          class="border border-gray-300 rounded-md p-2 pr-10 focus:outline-none focus:border-blue-500 w-full" 
          placeholder="Digite sua senha">
        <button 
          type="button" 
          @click="togglePasswordVisibility" 
          class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700">
          <svg v-if="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
          <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.944-9.543-7a9.963 9.963 0 012.133-3.987M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 3.055L20.945 20.945" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Campo de Seleção (Gênero) -->
    <div class="flex flex-col">
      <label for="gender" class="mb-1 font-medium text-gray-700">Gênero</label>
      <select 
        id="gender" 
        name="gender"
        v-model="form.gender" 
        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500">
        <option value="">Selecione</option>
        <option value="male">Masculino</option>
        <option value="female">Feminino</option>
        <option value="other">Outro</option>
      </select>
    </div>

    <!-- Campo de Texto (Descrição) -->
    <div class="flex flex-col">
      <label for="description" class="mb-1 font-medium text-gray-700">Descrição</label>
      <textarea 
        id="description" 
        name="description"
        v-model="form.description" 
        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500" 
        placeholder="Descreva algo sobre você"></textarea>
    </div>

    <!-- Botão de Envio -->
    <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 transition-colors">
      Enviar
    </button>
  </form>
</template>

<script>
  export default {
    props: {
      sessionMessage: {
        type: String,
        default: ''
      }
    }
  }
</script>