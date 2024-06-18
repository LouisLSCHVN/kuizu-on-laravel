<template>
    <div class="flex flex-col gap-4">
        <h1 class="text-3xl font-bold">Créér un quizz ?</h1>
        <button class="btn" @click="openModal">open modal</button>
        <dialog ref="myModal" id="my_modal_4" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <h3 class="font-bold text-xl mb-4">Quizz</h3>

                <form method="post" @submit.prevent="submitForm" class="flex flex-col gap-4">
                    <TextInput name="Title" v-model="form.title" :message="form.errors.title"/>
                    <TextInput type="textarea" name="Description" v-model="form.description" :message="form.errors.description"/>
                    <button type="submit" class="btn btn-primary">
                        Créer
                    </button>
                </form>
            </div>
        </dialog>
    </div>

    <show-quizz />
</template>

<script setup>
import showQuizz from "../../components/show-quizz.vue";
import { useForm } from "@inertiajs/vue3";
import TextInput from "../../components/text-input.vue";
import { ref } from 'vue';

const form = useForm({
    title: null,
    description: null
});

const myModal = ref(null);

const openModal = () => {
    myModal.value.showModal();
};

const closeModal = () => {
    myModal.value.close();
};

const submitForm = () => {
    form.post(route('quizz.store'), {
      onSuccess: () => {
          closeModal()
          form.reset()
      }
    })
};
</script>
